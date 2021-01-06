<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Repositories\MyRepository;
use Illuminate\Http\Request;


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
    public function getAllPaginate(Request $request)
    {
        $query = Company::select("company.*", "business_plan.name as business_plan_name")
            ->join('business_plan', 'company.business_plan_id', '=', 'business_plan.id');

        if ($request['search'] != '') {
            $key = $request['search'];
            $query->orWhere('company.name', 'LIKE', "%$key%");
            $query->orWhere('company.email', 'LIKE', "%$key%");
            $query->orWhere('company.phone', 'LIKE', "%$key%");
            $query->orWhere('company.address', 'LIKE', "%$key%");
            $query->orWhere('business_plan.name', 'LIKE', "%$key%");
        }

        if ($request['sort'] != '') {
            $query = $this->getSortedPaginateAfterSearched($query, $request['sort']);
        }

        return $query->paginate(config('constants.pagination.items_per_page'));
    }

    public function getSortedPaginateAfterSearched($query, $condition)
    {

        switch ($condition) {
            case "name":
                $query->orderBy('company.name');
                break;
            case "email":
                $query->orderBy('company.email');
                break;
            case "phone":
                $query->orderBy('company.phone');
                break;
            case "address":
                $query->orderBy('company.address');
                break;
            case "business-plan":
                $query->orderBy('business_plan.name');
                break;
        }

        return $query;
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
