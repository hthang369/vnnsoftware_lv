<?php

namespace App\Http\Controllers\BusinessPlan;

use App\Http\Controllers\Controller;
use App\Services\BusinessPlan\BusinessPlanService;
use App\Validations\BusinessPlanValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;


class BusinessPlanController extends Controller
{
    private $businessPlanService;

    private $businessPlanValidation;

    public function __construct(BusinessPlanService $businessPlanService, BusinessPlanValidation $businessPlanValidation)
    {
        $this->businessPlanService = $businessPlanService;
        $this->businessPlanValidation = $businessPlanValidation;
    }

    public function index()
    {
        return view('/business-plan/list', [
            'businessPlans' => $this->businessPlanService->getAllBusinessPlan()
        ]);
    }

    public function businessDetail($id)
    {
        $businessPlan = $this->businessPlanService->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(404, __('object_not_found'));
        }

        return view('/business-plan/detail',  [
            'businessPlan' => $businessPlan
        ]);
    }

    public function newForm() {
        return view('/business-plan/add_form', [

        ])->with('isNew', true);
    }

    public function new(Request $request)
    {
        $validator = $this->businessPlanValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {
            $businessPlan = $this->businessPlanService->create($input);
            return redirect()->intended('/system-admin/business-plan/detail/' . $businessPlan->id);
        } catch (\Exception $ex) {
            abort(500);
        }
    }

    public function updateForm($id) {
        return view('/business-plan/add_form', [
            'businessPlan' => $this->businessPlanService->getBusinessPlanInfo($id)
        ]);
    }

    public function update($id, Request $request)
    {
        $businessPlan = $this->businessPlanService->getBusinessPlanInfo(45);

        if (is_null($businessPlan)){
            abort(404, __('custom_message.object_not_found'));
        }

        $validator = $this->businessPlanValidation->updateValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $businessPlan = $this->businessPlanService->update($id, $input);
        } catch (\Exception $ex) {
            print_r($ex->getMessage()); exit;
            abort(404,'Page not found');
        }

        return redirect()->intended('/system-admin/business-plan/detail/' . $id);
    }

    public function delete($id)
    {
        $businessPlan = $this->businessPlanService->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(404,'Object not found');
        }

        try {
            $this->businessPlanService->delete($id);
        } catch (\Exception $ex) {
            print_r($ex->getMessage()); exit;
            abort(500);
        }

        return redirect()->intended('/system-admin/business-plan');
    }
}



