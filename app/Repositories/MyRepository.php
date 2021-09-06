<?php

namespace App\Repositories;

use Laka\Core\Repositories\BaseRepository;
use Illuminate\Http\Request;

class MyRepository extends BaseRepository
{
    use PresenterDataGrid;

    protected function querySearch($query, Request $request, $contactable)
    {
        foreach ($contactable as $column => $field) {
            if ($request[$field] != '') {
                $query->where($column, 'LIKE', "%" . $request[$field] . "%");
            }
        }

        return $query;
    }

    protected function querySort($query, Request $request, $contactable)
    {
        $direction = $request['direction'] == 'desc' ? 'desc' : 'asc';

        foreach ($contactable as $column => $field) {
            if ($request['sort'] == $field) {
                $query->orderBy($column, $direction);
                break;
            }
        }

        return $query;
    }
}
