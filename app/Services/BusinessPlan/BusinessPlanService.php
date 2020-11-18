<?php

namespace App\Services\BusinessPlan;


use App\Models\BusinessPlan;
use App\Repositories\BusinessPlan\BusinessPlanRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Models\Role;
use App\Services\Contract\MyService;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BusinessPlanService extends MyService
{
    private $businessPLanRepo;

    public function __construct(BusinessPlanRepositoryInterface $roleRepo)
    {
        $this->businessPLanRepo = $roleRepo;
    }

    public function create($input)
    {
        return $this->businessPLanRepo->create($input);
    }

    public function update($id, $input)
    {
        return $this->businessPLanRepo->update($id, $input);
    }

    public function updateInfoBusinessPlan($id, $input)
    {
        return $this->businessPLanRepo->updateInfoBusinessPlan($id, $input);
    }

    public function getBusinessPlanInfo($id)
    {
        return BusinessPlan::find($id);
    }

    public function getAllBusinessPlan()
    {
        return DB::table('business_plan')->get();
    }

    public function ruleCreateUpdate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:255',
            'maximum_storage' => 'max:255',
            'description' => 'required|max:255',
        ]);
    }

    public function delete($id){
        return BusinessPlan::where('id', $id)->delete();
    }
}

