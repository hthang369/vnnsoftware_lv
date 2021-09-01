<?php

namespace Modules\Admin\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\RolesModel;
use Modules\Admin\Forms\RolesForm;
use Modules\Admin\Grids\RolesGrid;
use Modules\Core\Services\FileManagementService;

class RolesRepository extends AdminBaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RolesModel::class;
    }

    /**
     * Specify Grid class name
     *
     * @return string
     */
    public function grid()
    {
        return RolesGrid::class;
    }

    protected function getQuery()
    {
        $this->scopeQuery(function ($model) {
            $model = $this->queryCountEmployee($model);
            return $this->queryOrderByRank($model);
        });
        return parent::getQuery();
    }

    protected function queryCountEmployee($model)
    {
        return $model->withCount('users');
    }

    protected function queryOrderByRank($model)
    {
        return $model->orderBy('role_rank')
                     ->orderBy('id');
    }
}
