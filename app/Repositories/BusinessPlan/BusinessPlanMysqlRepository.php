<?php

namespace App\Repositories\BusinessPlan;

use App\Models\BusinessPlan;
use App\Models\Company;
use App\Repositories\MyRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BusinessPlanMysqlRepository extends MyRepository implements BusinessPlanRepositoryInterface
{
    private $contactable = [
        'business_plan.name' => 'name',
        'business_plan.description' => 'description',
    ];

    /**
     * @param $input
     * @return mixed
     */
    public function create($input)
    {
        return BusinessPlan::create($input);
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input)
    {
        return BusinessPlan::where('id', $id)
            ->update($input);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getBusinessPlan($id)
    {
        return BusinessPlan::select(['id', 'name', 'description', 'maximum_storage_file'])->find($id);
    }

    /**
     * @return BusinessPlan[]|Collection
     */
    public function getAllBusinessPlan()
    {
        return BusinessPlan::all();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate(Request $request)
    {
        $query = BusinessPlan::query();

        if ($request->has('search')) {
            $query = $this->querySearch($query, $request, $this->contactable);
        }

        if ($request->has('sort')) {
            $query = $this->querySort($query, $request, $this->contactable);
        }

        return $query->paginate(config('constants.pagination.items_per_page'));
    }

    /**
     * @param $business_plan_id
     * @param $update_data
     * @return mixed
     */
    public function updateInfoBusinessPlan($business_plan_id, $update_data)
    {
        $role = BusinessPlan::where('id', $business_plan_id);

        $role->update(
            [
                'name' => $update_data->input('name'),
                'description' => $update_data->input('description'),
                'maximum_storage_file' => $update_data->input('maximum_storage_file'),
            ]);
        return BusinessPlan::select(['id', 'name', 'description', 'maximum_storage_file'])->find($business_plan_id);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete($id){
        return BusinessPlan::where('id', $id)->delete();
    }
}
