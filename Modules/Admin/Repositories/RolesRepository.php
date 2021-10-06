<?php

namespace Modules\Admin\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\RolesModel;
use Modules\Admin\Forms\RolesForm;
use Modules\Admin\Grids\RoleNewGrid;
use Modules\Admin\Grids\RolesGrid;

class RolesRepository extends AdminBaseRepository
{
    use RolesCriteria;
    protected $presenterClass = RolesGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RolesModel::class;
    }

    public function form()
    {
        return RolesForm::class;
    }

    public function newDataGrid()
    {
        // $this->scopeQuery(function ($model) {
        //     $model = $this->queryCountEmployee($model);
        //     return $this->queryOrderByRank($model);
        // });
        $data = parent::paginate();
        return [$data, $this->presenterGrid];
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
