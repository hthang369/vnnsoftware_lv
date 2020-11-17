<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{

    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $list = $this->companyService->getAll();
        return view('/company/list')->with('list', $list);
    }

    public function detail($id)
    {
        $company = $this->companyService->getById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        return view('/company/detail')->with('company', $company);
    }

    public function newForm() {
        return view('/company/add_form')->with('isNew', true);
    }

    public function updateForm($id) {
        $company = $this->companyService->getById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        return view('/company/add_form')->with('company', $company);
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
            return redirect()->intended('/system-admin/company/detail/' . $company->id);
        } catch (\Exception $ex) {
//            return $this->sentResponseFail($this->errorStatus, 'Can not create', $ex->getMessage());
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
            abort(404,'Page not found');
        }

        return redirect()->intended('/system-admin/company/detail/' . $id);
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
            abort(404,'Page not found');
        }

        return redirect()->intended('/system-admin/company');
    }
}
