<?php

namespace Modules\Admin\Repositories;

use Modules\Core\Repositories\BaseCriteriaEloquent;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class AdvertisesCriteria extends BaseCriteriaEloquent implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $builder = $model->where('advertise_type', 'advertise');
        return parent::apply($builder, $repository); // TODO: Change the autogenerated stub
    }
}
