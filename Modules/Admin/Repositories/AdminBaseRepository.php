<?php

namespace Modules\Admin\Repositories;

use Modules\Core\Repositories\BaseRepositoryEloquent;
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

        if ($this->count() == 0 || is_null($attributes[$this->model->getParentId()])) {
            $model->saveAsRoot();
        } else {
            $parent_id = $attributes[$this->model->getParentId()];

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

        if (is_null($attributes[$this->model->getParentId()])) {
            $model->saveAsRoot();
        } else {
            $parent_id = $attributes[$this->model->getParentId()];

            $parentNode = $this->find($parent_id);

            $parentNode->appendNode($model);
        }

        $this->skipPresenter($temporarySkipPresenter);

        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }
}
