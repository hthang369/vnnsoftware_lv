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

    public function Create($input)
    {
        return Company::create($input);
    }

    public function update($id, $input)
    {
        return Company::where('id', $id)
            ->update($input);
    }

    public function delete($id)
    {
        return Company::where('id', $id)->delete();
    }
}
