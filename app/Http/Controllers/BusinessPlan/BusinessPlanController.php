<?php

namespace App\Http\Controllers\BusinessPlan;

use App\Http\Controllers\Controller;
use App\Services\BusinessPlan\BusinessPlanService;
use App\Validations\BusinessPlanValidation;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Redirect;

class BusinessPlanController extends Controller
{
    private $businessPlanService;

    private $businessPlanValidation;

    /**
     * BusinessPlanController constructor.
     * @param BusinessPlanService $businessPlanService
     * @param BusinessPlanValidation $businessPlanValidation
     */
    public function __construct(BusinessPlanService $businessPlanService, BusinessPlanValidation $businessPlanValidation)
    {
        parent::__construct();
        $this->businessPlanService = $businessPlanService;
        $this->businessPlanValidation = $businessPlanValidation;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('/common/index_page_top_menu');
    }

    /**
     * @return Application|Factory|View
     */
    public function list(Request $request)
    {
        return view('/business-plan/list', [
            'businessPlans' => $this->businessPlanService->list($request)
        ]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function detailForm($id)
    {
        return view('/business-plan/detail', [
            'businessPlan' => $this->businessPlanService->getBusinessPlanInfo($id)
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function newForm() {
        return view('/business-plan/add_form', [])->with('isNew', true);
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function new(Request $request)
    {
        $input = $request->all();
        $validator = $this->businessPlanService->newValidate($input);

        if ($validator->fails()) {
            return redirect()->intended('system-admin/business-plan/new')->withInput()->withErrors($validator->errors());
        }

        try {
            $businessPlan = $this->businessPlanService->create($input);
            return redirect()->intended('/system-admin/business-plan/detail/' . $businessPlan->id);
        } catch (Exception $ex) {
            abort(500, $ex->getMessage());
        }
    }


    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function updateForm($id) {
        return view('/business-plan/update_form', [
            'businessPlan' => $this->businessPlanService->getBusinessPlanInfo($id)
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, Request $request)
    {
        $businessPlan = $this->businessPlanService->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(400, __('custom_message.business_plan_not_found'));
        }

        $input = request()->except(['_token', 'role']);

        $validator = $this->businessPlanService->updateValidate($input);

        if ($validator->fails()) {
            return redirect()->intended('/system-admin/business-plan/update/' . $id)->withInput()->withErrors($validator->errors());
        }

        try {
            $businessPlan = $this->businessPlanService->update($id, $input);
        } catch (Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/business-plan/detail/' . $id);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        $businessPlan = $this->businessPlanService->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(400, __('custom_message.business_plan_not_found'));
        }

        try {
            $this->businessPlanService->delete($id);
        } catch (Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/business-plan');
    }

    /**
     * @return Application|Factory|View
     */
    public function searchForm() {
        return view('/business-plan/search');
    }
}



