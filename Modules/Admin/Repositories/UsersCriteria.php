<?php

namespace Modules\Admin\Repositories;

use Modules\Core\Repositories\BaseCriteriaEloquent;
use Prettus\Repository\Contracts\CriteriaInterface;

class UsersCriteria extends BaseCriteriaEloquent implements CriteriaInterface
{
    protected function fullnameFilter($value)
    {
        return $this->builder->where('name', 'like', "%$value%");
    }

    protected function agingSort($direction)
    {
        return $this->builder->orderBy('age', $direction);
    }
}
