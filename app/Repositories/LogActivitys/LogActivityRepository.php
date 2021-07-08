<?php

namespace App\Repositories\LogActivitys;

use App\Core\Repositories\BaseRepository;
use App\Core\Repositories\FilterQueryString\Filters\WhereClause;
use App\Models\LogActivitys\LogActivity;

class LogActivityRepository extends BaseRepository
{
    protected $modelClass = LogActivity::class;

    protected $filters = [
        'name' => WhereClause::class
    ];
}
