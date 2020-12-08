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
        return $this->businessPlanService->list();
    }

    public function detailForm($id)
    {
        return $this->businessPlanService->detailForm($id);
    }

    public function newForm() {
        return $this->businessPlanService->newForm();
    }

    public function new(Request $request)
    {
       return $this->businessPlanService->create($request);
    }

    public function updateForm($id) {
        return $this->businessPlanService->updateForm($id);
    }

    public function update($id, Request $request)
    {
        return $this->businessPlanService->update($id, $request);
    }

    public function delete($id)
    {
        return $this->businessPlanService->delete($id);
    }
}



