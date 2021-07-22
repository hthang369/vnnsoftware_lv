<?php

namespace App\Repositories\LogReleases;

use App\Repositories\Core\CoreRepository;
use App\Models\LogReleases\LogRelease;
use App\Presenters\LogReleases\LogReleaseGridPresenter;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class LogReleaseRepository extends CoreRepository
{
    protected $modelClass = LogRelease::class;

    protected $filters = [
        'name' => WhereClause::class
    ];

    protected $presenterClass = LogReleaseGridPresenter::class;
}
