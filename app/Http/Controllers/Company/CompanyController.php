<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\Company\CompanyService;
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
        return view('/company/list');
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

    public function updateForm() {
        return view('/company/update_form');
    }

    public function register(Request $request)
    {

        $validator = $this->companyService->ruleCreateUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make('password');

        try {

            $company = $this->companyService->create($input);
            return $this->detail($company->id);
        } catch (\Exception $ex) {
//            return $this->sentResponseFail($this->errorStatus, 'Can not create', $ex->getMessage());
        }

    }
}
