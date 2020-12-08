<?php

namespace App\Services\BusinessPlan;


use App\Models\BusinessPlan;
use App\Repositories\BusinessPlan\BusinessPlanRepositoryInterface;
use App\Services\Contract\MyService;
use App\User;
use App\Validations\BusinessPlanValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BusinessPlanService extends MyService
{
    private $businessPLanRepo;
    private $businessPlanValidation;

    public function __construct(BusinessPlanRepositoryInterface $roleRepo, BusinessPlanValidation $businessPlanValidation)
    {
        $this->businessPLanRepo = $roleRepo;
        $this->businessPlanValidation = $businessPlanValidation;
    }

    public function list()
    {
        return view('/business-plan/list', [
            'businessPlans' => $this->getAllBusinessPlan()
        ]);
    }

    public function create( $request)
    {
        $validator = $this->businessPlanValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {
            $businessPlan = $this->businessPLanRepo->create($input);
            return redirect()->intended('/system-admin/business-plan/detail/' . $businessPlan->id);
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        $businessPlan = $this->getBusinessPlanInfo($id);

        if (is_null($businessPlan)){
            abort(400, __('custom_message.business_plan_not_found'));
        }

        $validator = $this->businessPlanValidation->updateValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $businessPlan = $this->businessPLanRepo->update($id, $input);
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/business-plan/detail/' . $id);
        //return $this->businessPLanRepo->update($id, $input);
    }

    public function updateInfoBusinessPlan($id, $input)
    {
        return $this->businessPLanRepo->updateInfoBusinessPlan($id, $input);
    }

    public function getBusinessPlanInfo($id)
    {
        $businessPlan = BusinessPlan::find($id);

        if (is_null($businessPlan)) {
            abort(400, __('custom_message.business_plan_not_found'));
        }

        return $businessPlan;
    }

    public function delete($id){

        $businessPlan = $this->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(404, __('custom_message.business_plan_not_found'));
        }

        try {
            BusinessPlan::where('id', $id)->delete();
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/business-plan');
    }

    public function newForm() {
        return view('/business-plan/add_form', [

        ])->with('isNew', true);
    }

    public function detailForm($id) {
        return view('/business-plan/detail',  [
            'businessPlan' => $this->getBusinessPlanInfo($id)
        ]);
    }

    public function updateForm($id) {
        return view('/business-plan/add_form', [
            'businessPlan' => $this->getBusinessPlanInfo($id)
        ]);
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

}

