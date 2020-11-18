<?php

namespace App\Repositories\BusinessPlan;

use App\Models\BusinessPlan;
use App\Repositories\MyRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BusinessPlanMysqlRepository extends MyRepository implements BusinessPlanRepositoryInterface
{
    public function create($input)
    {
        return BusinessPlan::create($input);
    }

    public function update($id, $input)
    {
        return BusinessPlan::where('id', $id)
            ->update($input);
    }

    public function getBusinessPlan($data)
    {
        switch ($data['type']) {
            case "id":
                return BusinessPlan::select(['id', 'name', 'description', 'maximum_storage_file'])->find($data['id']);
                break;
        }
    }

    public function getAllBusinessPlan($data)
    {
        return BusinessPlan::all();
    }

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
}
