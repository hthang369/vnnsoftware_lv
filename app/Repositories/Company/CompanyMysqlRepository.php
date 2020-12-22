<?php

namespace App\Repositories\Company;

use App\Repositories\MyRepository;
use App\Models\Company;

class CompanyMysqlRepository extends MyRepository implements CompanyRepositoryInterface
{

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Company::find($id);
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return Company::select("company.*", "business_plan.name as business_plan_name")
            ->join('business_plan', 'company.business_plan_id', '=', 'business_plan.id')
            ->paginate(config('constants.pagination.items_per_page'));
    }

    /**
     * @param $input
     * @return Company
     */
    public function create($input)
    {
        $company = new Company($input);
        $company->save();
        return $company;
    }
}
