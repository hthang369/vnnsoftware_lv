<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\BusinessPlan\BusinessPlanService;
use App\Services\Company\CompanyService;
use App\Validations\CompanyValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{

    private $companyService;
    private $businessPlanService;
    private $companyValidation;

    public function __construct(CompanyService $companyService, BusinessPlanService $businessPlanService, CompanyValidation $companyValidation)
    {
        $this->companyService = $companyService;
        $this->businessPlanService = $businessPlanService;
        $this->companyValidation = $companyValidation;
    }

    public function index()
    {
        return $this->companyService->list();
    }

    public function detail($id)
    {
        return $this->companyService->detail($id);
    }

    public function newForm() {
        return $this->companyService->newForm();
    }

    public function updateForm($id) {
        return $this->companyService->updateForm($id);
    }

    public function register(Request $request)
    {

        return $this->companyService->Create($request);

    }

    public function update($id, Request $request)
    {

        return $this->companyService->update($id, $request);

    }

    public function delete($id)
    {
        return $this->companyService->delete($id);
    }
}
