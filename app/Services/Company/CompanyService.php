<?php

namespace App\Services\Company;

use App\Repositories\Company\CompanyRepositoryInterface;
use App\Services\BusinessPlan\BusinessPlanService;
use App\Services\Contract\MyService;
use App\Company;
use App\Validations\CompanyValidation;
use Illuminate\Http\Request;

class CompanyService extends MyService
{
    private $companyRepo;
    private $businessPlanService;
    private $companyValidation;

    public function __construct(
        CompanyRepositoryInterface $companyRepo,
        BusinessPlanService $businessPlanService,
        CompanyValidation $companyValidation)
    {
        $this->companyRepo = $companyRepo;
        $this->businessPlanService = $businessPlanService;
        $this->companyValidation = $companyValidation;
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
            abort(400, __('custom_message.company_not_found'));
        }

        $company->business_plan = $company->business_plan();

        return view('/company/detail')->with('company', $company);
    }

    public function newForm()
    {
        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();
        return view('/company/add_form')->with('listBusinessPlan', $listBusinessPlan);
    }

    public function create(Request $request)
    {
        $validator = $this->companyValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {
            $company = $this->companyRepo->Create($input);
            return redirect()->intended('/system-admin/company/detail/' . $company->id)->with('saved', true);
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }
    }

    public function updateForm($id)
    {
        $company = $this->companyRepo->getById($id);

        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();

        if (is_null($company)) {
            abort(400, __('custom_message.company_not_found'));
        }

        return view('/company/update_form')->with(['company' => $company, 'listBusinessPlan' => $listBusinessPlan]);
    }

    public function update($id, Request $request)
    {
        $company = $this->companyRepo->getById($id);

        if (is_null($company)) {
            abort(400, __('custom_message.company_not_found'));
        }

        $validator = $this->companyValidation->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $this->companyRepo->update($id, $input);
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/company/detail/' . $id)->with('saved', true);
    }

    public function delete($id)
    {
        $company = $this->companyRepo->getById($id);

        if (is_null($company)) {
            abort(400, __('custom_message.company_not_found'));
        }

        try {
            $this->companyRepo->delete($id);
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/company')->with('deleted', true);
    }

}
