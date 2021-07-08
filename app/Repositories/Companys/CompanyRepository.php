<?php

namespace App\Repositories\Companys;

use App\Core\Repositories\BaseRepository;
use App\Models\Companys\Company;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class CompanyRepository extends BaseRepository
{
    protected $modelClass = Company::class;

    protected $filters = [
        'name' => WhereClause::class
    ];
}
