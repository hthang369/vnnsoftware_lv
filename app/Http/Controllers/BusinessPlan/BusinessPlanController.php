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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('/business-plan/list', [
            'businessPlans' => $this->businessPlanService->list($request)
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function sort(Request $request) {
        $condition = $this->businessPlanService->getSortConditionFromUrl($request);
        $list = $this->businessPLanRepo->getAllSortedBusinessPlan($condition);

        return view('/business-plan/list')->with('businessPlans', $list);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detailForm($id)
    {
        return $this->businessPlanService->detailForm($id);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm() {
        return $this->businessPlanService->newForm();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function new(Request $request)
    {
       return $this->businessPlanService->create($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateForm($id) {
        return $this->businessPlanService->updateForm($id);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        return $this->businessPlanService->update($id, $request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        return $this->businessPlanService->delete($id);
    }
}



