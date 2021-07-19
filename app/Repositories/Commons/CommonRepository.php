<?php

namespace App\Repositories\Commons;

use App\Repositories\Core\CoreRepository;
use App\Models\Commons\Common;
use App\Presenters\Commons\CommonGridPresenter;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class CommonRepository extends CoreRepository
{
    protected $modelClass = Common::class;

    protected $filters = [
        'name' => WhereClause::class
    ];

    protected $presenterClass = CommonGridPresenter::class;
}
