<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\BusinessPlan\BusinessPlanService;
use App\Services\Company\CompanyService;
use App\Validations\CompanyValidation;
use Illuminate\Http\Request;

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
<<<<<<< HEAD

        $validator = $this->companyValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {
            $company = $this->companyService->create($input);
            return redirect()->intended('/system-admin/company/detail/' . $company->id);
        } catch (\Exception $ex) {
            abort(500);
        }
=======
        return $this->companyService->Create($request);
>>>>>>> origin/master
    }

    public function update($id, Request $request)
    {
<<<<<<< HEAD
        $company = $this->companyService->getById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        $validator = $this->companyValidation->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $company = $this->companyService->update($id, $input);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/company/detail/' . $id)->with('saved', true);
=======
        return $this->companyService->update($id, $request);
>>>>>>> origin/master
    }

    public function delete($id)
    {
        return $this->companyService->delete($id);
    }
}
