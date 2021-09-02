<?php

namespace Modules\Api\Repositories;

use Modules\Core\Repositories\BaseCriteriaEloquent;
use Prettus\Repository\Contracts\CriteriaInterface;

class NewsCriteria extends BaseCriteriaEloquent implements CriteriaInterface
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
