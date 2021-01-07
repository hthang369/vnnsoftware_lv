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

        $query = $this->querySearch($query, $request);

        if ($request['sort'] != '') {
            $query = $this->querySort($query, $request);
        }

        return $query->paginate(config('constants.pagination.items_per_page'));
    }

    protected function querySearch($query, Request $request)
    {
        if ($request['name'] != '') {
            $query->where('company.name', 'LIKE', "%" . $request['name'] . "%");
        }
        if ($request['email'] != '') {
            $query->where('company.email', 'LIKE', "%" . $request['email'] . "%");
        }
        if ($request['phone'] != '') {
            $query->where('company.phone', 'LIKE', "%" . $request['phone'] . "%");
        }
        if ($request['address'] != '') {
            $query->where('company.address', 'LIKE', "%" . $request['address'] . "%");
        }
        if ($request['name'] != '') {
            $query->where('business_plan.name', 'LIKE', "%" . $request['business-plan'] . "%");
        }

        return $query;
    }

    protected function querySort($query, Request $request)
    {
        $direction = $request['direction'] == 'desc' ? 'desc' : 'asc';
        switch ($request['sort']) {
            case "name":
                $query->orderBy('company.name', $direction);
                break;
            case "email":
                $query->orderBy('company.email', $direction);
                break;
            case "phone":
                $query->orderBy('company.phone', $direction);
                break;
            case "address":
                $query->orderBy('company.address', $direction);
                break;
            case "business-plan":
                $query->orderBy('business_plan.name', $direction);
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
