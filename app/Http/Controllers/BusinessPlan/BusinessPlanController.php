<?php

namespace App\Http\Controllers\BusinessPlan;

use App\Http\Controllers\Controller;
use App\Services\BusinessPlan\BusinessPlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class BusinessPlanController extends Controller
{
    private $businessPlanService;

    public function __construct(BusinessPlanService $businessPlanService)
    {
        $this->businessPlanService = $businessPlanService;
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
            abort(404,'Page not found');
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
        $validator = $this->businessPlanService->ruleCreateUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {
            $businessPlan = $this->businessPlanService->create($input);
            return redirect()->intended('/system-admin/business-plan/detail/' . $businessPlan->id)->with('saved', true);
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
        $businessPlan = $this->businessPlanService->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(404,'Page not found');
        }

        $validator = $this->businessPlanService->ruleCreateUpdate($request->all(), $id);

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



