<?php

namespace Modules\Admin\Repositories;

use Vnnit\Core\Repositories\CoreRepository;
use Vnnit\Core\Support\FileManagementService;

abstract class AdminBaseRepository extends CoreRepository
{
    public function createNestedTree(array $attributes)
    {
        $model = $this->model->newInstance($attributes);

        if ($this->model->count() == 0 || is_null(data_get($attributes, $this->model->getParentIdName(), null))) {
            $model->saveAsRoot();
        } else {
            $parent_id = $attributes[$this->model->getParentIdName()];

            $parentNode = $this->find($parent_id);

            $parentNode->appendNode($model);
        }

        $this->resetModel();

        return $this->parserResult($model);
    }

    public function updateNestedTree(array $attributes, $id)
    {
        $this->applyScope();

        $model = $this->model->findOrFail($id);

        $model->fill($attributes);

        if (is_null(data_get($attributes, $this->model->getParentIdName(), null))) {
            $model->saveAsRoot();
        } else {
            $parent_id = $attributes[$this->model->getParentIdName()];

            $parentNode = $this->find($parent_id);

            $parentNode->appendNode($model);
        }

        $this->resetModel();

        return $this->parserResult($model);
    }

    protected function uploadFile($attributes, $imageName, $imageOld = null, $isDone = true)
    {
        if ($this->service && $this->service instanceof FileManagementService) {
            $dataImageName = '';
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
