<?php

namespace Modules\Admin\Repositories;

trait PagesCriteria
{
    public function apply($model)
    {
        $builder = $model->where('post_type', 'page');
        return $builder; // TODO: Change the autogenerated stub
    }
}