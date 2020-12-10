<?php

namespace App\Repositories\Company;

use App\Repositories\MyRepository;
use App\Models\Company;

class CompanyMysqlRepository extends MyRepository implements CompanyRepositoryInterface
{

    public function getById($id)
    {
        return Company::find($id);
    }

    public function getAll()
    {
        $company = new Company();
        return $company->select("company.*", "business_plan.name as business_plan_name")->whereNull('company.deleted_at')
            ->join('business_plan', 'company.business_plan_id', '=', 'business_plan.id')->get();
    }

    public function create($input)
    {
        $company = new Company($input);
        $company->save();
        return $company;
    }
}
