<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Repositories\MyRepository;
use Illuminate\Http\Request;


class CompanyMysqlRepository extends MyRepository implements CompanyRepositoryInterface
{

    private $contactable = [
        'company.name' => 'name',
        'company.email' => 'email',
        'company.phone' => 'phone',
        'company.address' => 'address',
        'business_plan.name' => 'business-plan',
    ];

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
    public function getAllPaginate(Request $request)
    {
        $query = Company::select("company.*", "business_plan.name as business_plan_name")
            ->join('business_plan', 'company.business_plan_id', '=', 'business_plan.id');

        if ($request->has('search')) {
            $query = $this->querySearch($query, $request, $this->contactable);
        }

        if ($request->has('sort')) {
            $query = $this->querySort($query, $request, $this->contactable);
        }

        return $query->paginate(config('constants.pagination.items_per_page'));
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
