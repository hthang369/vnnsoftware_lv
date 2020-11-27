<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\BusinessPlan\BusinessPlanService;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{

    private $companyService;
    private $businessPlanService;

    public function __construct(CompanyService $companyService, BusinessPlanService $businessPlanService)
    {
        $this->companyService = $companyService;
        $this->businessPlanService = $businessPlanService;
    }

    public function index()
    {
        $list = $this->companyService->getAll();
        return view('/company/list')->with('list', $list);
    }

    public function detail($id)
    {
        $company = $this->companyService->getDetailById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        return view('/company/detail')->with('company', $company);
    }

    public function newForm() {
        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();
        return view('/company/add_form')->with(['isNew' => true, 'listBusinessPlan' => $listBusinessPlan]);
    }

    public function updateForm($id) {
        $company = $this->companyService->getById($id);

        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        return view('/company/add_form')->with(['company' => $company, 'listBusinessPlan' => $listBusinessPlan]);
    }

    public function register(Request $request)
    {

        $validator = $this->companyService->ruleCreateUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {

            $company = $this->companyService->create($input);
            return redirect()->intended('/system-admin/company/detail/' . $company->id)->with('saved', true);
        } catch (\Exception $ex) {
            abort(500);
        }
    }

    public function update($id, Request $request)
    {
        $company = $this->companyService->getById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        $validator = $this->companyService->ruleCreateUpdate($request->all(), $id);

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
    }

    public function delete($id)
    {
        $company = $this->companyService->getById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        try {

            $this->companyService->delete($id);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/company')->with('deleted', true);
    }
}
