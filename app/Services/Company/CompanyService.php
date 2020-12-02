<?php

namespace App\Services\Company;

use App\Repositories\Company\CompanyRepositoryInterface;
use App\Services\BusinessPlan\BusinessPlanService;
use App\Services\Contract\MyService;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyService extends MyService
{
    private $companyRepo;
    private $businessPlanService;

    public function __construct(CompanyRepositoryInterface $companyRepo, BusinessPlanService $businessPlanService)
    {
        $this->companyRepo = $companyRepo;
        $this->businessPlanService = $businessPlanService;

    }

    public function list()
    {
        $list = $this->companyRepo->getAll();
        return view('/company/list')->with('list', $list);
    }

    public function detail($id)
    {
        $company = $this->companyRepo->getById($id);

        if (is_null($company)) {
            abort(404);
        }

        $company->business_plan = $company->business_plan();

        return view('/company/detail')->with('company', $company);
    }

    public function getById($id)
    {
        return $this->companyRepo->getById($id);
    }

    public function newForm() {
        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();
        return view('/company/add_form')->with(['isNew' => true, 'listBusinessPlan' => $listBusinessPlan]);
    }

    public function Create(Request $request)
    {
        $validator = $this->ruleCreate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {

            $company = $this->companyRepo->Create($input);
            return redirect()->intended('/system-admin/company/detail/' . $company->id)->with('saved', true);
        } catch (\Exception $ex) {
            abort(500);
        }
    }

    public function updateForm($id) {
        $company = $this->companyRepo->getById($id);

        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();

        if (is_null($company)) {
            abort(404);
        }

        return view('/company/add_form')->with(['company' => $company, 'listBusinessPlan' => $listBusinessPlan]);
    }

    public function update($id, Request $request)
    {
        $company = $this->companyRepo->getById($id);

        if (is_null($company)) {
            abort(404);
        }

        $validator = $this->ruleUpdate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $this->companyRepo->update($id, $input);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/company/detail/' . $id)->with('saved', true);
    }

    public function getCompanyInfo($id)
    {
        return Company::find($id);
    }

    public function getAll()
    {
        return $this->companyRepo->getAll();
    }

    public function delete($id)
    {
        $company = $this->companyRepo->getById($id);

        if (is_null($company)) {
            abort(404);
        }

        try {

            $this->companyRepo->delete($id);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/company')->with('deleted', true);
    }

    private function ruleCreate($request)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|max:255|unique:company',
            'name' => 'required|max:255|unique:company',
            'business_plan_id' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
        ]);
    }

    private function ruleUpdate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|max:255|unique:company,email,' . $id,
            'name' => 'required|max:255|unique:company,name,' . $id,
            'business_plan_id' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
        ]);
    }
}
