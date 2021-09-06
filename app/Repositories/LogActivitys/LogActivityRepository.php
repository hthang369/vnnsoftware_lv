<?php

namespace App\Repositories\LogActivitys;

use Laka\Core\Repositories\BaseRepository;
use Laka\Core\Repositories\FilterQueryString\Filters\WhereClause;
use App\Models\LogActivitys\LogActivity;

class LogActivityRepository extends BaseRepository
{
    protected $modelClass = LogActivity::class;

    protected $filters = [
        'name' => WhereClause::class
    ];
}
