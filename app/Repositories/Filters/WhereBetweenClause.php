<?php

namespace App\Repositories\Filters;

use App\Core\Repositories\FilterQueryString\Filters\BaseClause;
use Illuminate\Database\Eloquent\Builder;

class WhereBetweenClause extends BaseClause {

    protected function apply($query): Builder
    {
        $query->whereBetween($this->column, $this->values);

        return $query;
    }

    protected function validate($value): bool {
        return !is_null($value);
    }
}
