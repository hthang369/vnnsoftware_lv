<?php

namespace App\Repositories\Companys;

use App\Models\Companys\Company;
use App\Presenters\Companys\CompanyGridPresenter;
use App\Repositories\BusinessPlans\BusinessPlanRepository;
use App\Repositories\Core\CoreRepository;
use Lampart\Hito\Core\Repositories\FilterQueryString\Filters\WhereClause;

class CompanyRepository extends CoreRepository
{
    protected $modelClass = Company::class;

    protected $filters = [
        'name' => WhereClause::class
    ];

    protected $presenterClass = CompanyGridPresenter::class;

    public function formGenerate()
    {
        $businessPlanRepo = resolve(BusinessPlanRepository::class);
        return ['listBusinessPlan' => $businessPlanRepo->all()];
    }
}
