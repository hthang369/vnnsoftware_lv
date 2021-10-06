<?php

namespace Modules\Admin\Repositories;

trait AdvertisesCriteria
{
    public function apply($model)
    {
        $builder = $model->where('advertise_type', 'advertise');
        return parent::apply($builder); // TODO: Change the autogenerated stub
    }
}
