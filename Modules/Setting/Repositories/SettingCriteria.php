<?php

namespace Modules\Setting\Repositories;

use Modules\Core\Repositories\BaseCriteriaEloquent;
use Prettus\Repository\Contracts\CriteriaInterface;

class SettingCriteria extends BaseCriteriaEloquent implements CriteriaInterface
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
