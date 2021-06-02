<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Models\Company;
use App\Services\Company\CompanyService;
use App\Services\BusinessPlan\BusinessPlanService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{

    private $companyService;
    private $companyRepo;
    private $businessPlanService;

    /**
     * CompanyController constructor.
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService,
        CompanyRepositoryInterface $companyRepo,
        BusinessPlanService $businessPlanService )
    {
        parent::__construct();
        $this->companyRepo = $companyRepo;
        $this->companyService = $companyService;
        $this->businessPlanService = $businessPlanService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('/common/index_page_top_menu');
    }

    /**
     * @return Application|Factory|View
     */
    public function list(Request $request)
    {
        $list = $this->companyService->list($request);
        return view('/company/list')->with('list', $list);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function detail($id)
    {
        $company = $this->companyService->detail($id);
        return view('/company/detail')->with('company', $company);
    }

    /**
     * @return Application|Factory|View
     */
    public function newForm() {
        $listBusinessPlan = $this->companyService->newForm();
        return view('/company/add_form')->with('listBusinessPlan', $listBusinessPlan);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function updateForm($id) {

        $company = $this->companyService->getById($id);

        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();

        $this->companyService->handleCompanyNull($company);

        return view('/company/update_form')
            ->with(['company' => $company, 'listBusinessPlan' => $listBusinessPlan]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request)
    {
        $input = $request->all();
        // validate inputs
        $validator = $this->companyService->validateNew($input);
        if($validator->fails())
            return redirect()->intended('/system-admin/company/new')->withInput()->withErrors($validator->errors());

        // create new company in db
        try {
            $company = $this->companyService->create($input);
            return redirect()->intended('/system-admin/company/detail/' . $company->id)->with('saved', true);
        } catch (Exception $ex) {
            abort(400 , $ex->getMessage());
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, Request $request)
    {
        // get company by id
        $company = $this->companyService->getById($id);
        // handle if company null
        $this->companyService->handleCompanyNull($company);

        $input = request()->except(['_token', 'role']);
        // validate inputs
        $validator = $this->companyService->validateUpdate($input, $id);
        if($validator->fails())
            return redirect()
                ->intended('/system-admin/company/update/' . $id)
                ->withInput()
                ->withErrors($validator->errors());

        // update
        try {
            $this->companyService->update($company, $input);
            return redirect()->intended('/system-admin/company/detail/' . $id)->with('saved', true);
        } catch (Exception $ex) {
            abort(400, $ex->getMessage());
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {

        $company = $this->companyService->getById($id);

        $this->companyService->handleCompanyNull($company);

        try {
            $this->companyService->delete($company);
        } catch (Exception $ex) {
            abort(500, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/company/list')->with('deleted', true);
    }

    public function searchForm() {
        return view('company/search');
    }
}
