<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    private $companyService;

    /**
     * CompanyController constructor.
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService)
    {
        parent::__construct();
        $this->companyService = $companyService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $list = $this->companyService->list($request);
        return view('/company/list')->with('list', $list);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $company = $this->companyService->detail($id);
        return view('/company/detail')->with('company', $company);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm() {
        $listBusinessPlan = $this->companyService->newForm();
        return view('/company/add_form')->with('listBusinessPlan', $listBusinessPlan);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateForm($id) {
        return $this->companyService->updateForm($id);
        return view('/company/update_form')->with(['company' => $company, 'listBusinessPlan' => $listBusinessPlan]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        return $this->companyService->create($request);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        return $this->companyService->update($id, $request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        return $this->companyService->delete($id);
    }
}
