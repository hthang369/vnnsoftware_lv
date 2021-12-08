<?php

namespace Modules\Admin\Repositories;

trait MenusCriteria
{
    public function apply($model)
    {
        $menu_type = request('type');
        $builder = $model->where('menu_type', $menu_type)->defaultOrder();
        return $builder; // TODO: Change the autogenerated stub
    }
}