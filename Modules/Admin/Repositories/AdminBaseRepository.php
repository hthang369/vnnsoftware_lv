<?php

namespace Modules\Admin\Repositories;

use Modules\Core\Repositories\BaseRepositoryEloquent;
use Modules\Core\Services\FileManagementService;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityCreating;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Repository\Events\RepositoryEntityUpdating;

abstract class AdminBaseRepository extends BaseRepositoryEloquent
{
    public function createNestedTree(array $attributes)
    {
        event(new RepositoryEntityCreating($this, $attributes));

        $model = $this->model->newInstance($attributes);

        if ($this->count() == 0 || is_null(data_get($attributes, $this->model->getParentIdName(), null))) {
            $model->saveAsRoot();
        } else {
            $parent_id = $attributes[$this->model->getParentIdName()];

            $parentNode = $this->find($parent_id);

            $parentNode->appendNode($model);
        }

        $this->resetModel();

        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }

    public function updateNestedTree(array $attributes, $id)
    {
        $this->applyScope();

        $temporarySkipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $model = $this->model->findOrFail($id);

        event(new RepositoryEntityUpdating($this, $model));

        $model->fill($attributes);

        if (is_null(data_get($attributes, $this->model->getParentIdName(), null))) {
            $model->saveAsRoot();
        } else {
            $parent_id = $attributes[$this->model->getParentIdName()];

            $parentNode = $this->find($parent_id);

            $parentNode->appendNode($model);
        }

        $this->skipPresenter($temporarySkipPresenter);

        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }

    protected function uploadFile($attributes, $imageName, $imageOld = null, $isDone = true)
    {
        if ($this->service && $this->service instanceof FileManagementService) {
            if (isset($attributes[$imageName])) {
                $fileData = array_first($this->service->uploadFileImages([$attributes[$imageName]]));
                $dataImageName = $fileData['file_name'];
                unset($attributes[$imageName]);
                if ($isDone) {
                    $this->deleteFile($imageOld);
                }
            }
            return $dataImageName;
        }
        return null;
    }

    protected function deleteFile($imageName)
    {
        if ($this->service && $this->service instanceof FileManagementService) {
            if (!is_null($imageName)) {
                $this->service->deleteFileType('images', $imageName);
            }
        }
    }
}
