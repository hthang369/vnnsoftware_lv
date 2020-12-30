<?php

namespace App\Repositories\BusinessPlan;

use App\Models\BusinessPlan;
use App\Models\Company;
use App\Repositories\MyRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BusinessPlanMysqlRepository extends MyRepository implements BusinessPlanRepositoryInterface
{
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
     * @return BusinessPlan[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllBusinessPlan()
    {
        return BusinessPlan::all();
    }

    public function getAllSortedBusinessPlan($condition)
    {
        //$businessPlan = BusinessPlan::select();
        $list = BusinessPlan::all();
        switch ($condition) {
            case "name":
                return $list->sortBy('name');
            case "description":
                return $list->sortBy('description');
            default:
                return $this->getAllBusinessPlan();
        }
        return $list;
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
