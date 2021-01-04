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
    public function getAllPaginate()
    {
        return Company::select("company.*", "business_plan.name as business_plan_name")
            ->join('business_plan', 'company.business_plan_id', '=', 'business_plan.id')
            ->paginate(config('constants.pagination.items_per_page'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function searchAllPaginate(Request $request){

        $company = Company::select("company.*", "business_plan.name as business_plan_name")
            ->join('business_plan', 'company.business_plan_id', '=', 'business_plan.id');

        if($request['name'] != '')
            $company->where('company.name', 'LIKE', '%'.$request['name'].'%');
        if($request['email'] != '')
            $company->where('company.email', 'LIKE', '%'.$request['email'].'%');
        if($request['phone'] != '')
            $company->where('company.phone', 'LIKE', '%'.$request['phone'].'%');
        if($request['address'] != '')
            $company->where('company.address', 'LIKE', '%'.$request['address'].'%');
        if($request['business-plan'] != '')
            $company->where('business_plan.name', 'LIKE', '%'.$request['business-plan'].'%');

        return $company->paginate(config('constants.pagination.items_per_page'));
    }


    /**
     * @param $condition
     * @return mixed
     */
    public function getAllSortedPaginate($condition)
    {
        $list = Company::select("company.*", "business_plan.name as business_plan_name")
            ->join('business_plan', 'company.business_plan_id', '=', 'business_plan.id');

        switch ($condition) {
            case "name":
                $list->orderBy('company.name');
                break;
            case "email":
                $list->orderBy('company.email');
                break;
            case "phone":
                $list->orderBy('company.phone') ;
                break;
            case "address":
                $list->orderBy('company.address');
                break;
            case "business-plan":
                $list->orderBy('business_plan.name');
                break;
            default:
                $this->getAllPaginate();
                break;
        }
        return $list->paginate(config('constants.pagination.items_per_page'));
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
