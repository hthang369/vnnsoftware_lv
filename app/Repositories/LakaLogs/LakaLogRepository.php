<?php

namespace App\Repositories\LakaLogs;

use App\Repositories\Core\CoreRepository;
use App\Models\LakaLogs\LakaLog;
use App\Presenters\LakaLogs\LakaLogGridPresenter;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class LakaLogRepository extends CoreRepository
{
    protected $modelClass = LakaLog::class;

    protected $filters = [
        'name' => WhereClause::class
    ];

    protected $presenterClass = LakaLogGridPresenter::class;
}
