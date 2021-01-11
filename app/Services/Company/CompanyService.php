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

    /**
     * CompanyService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     * @param BusinessPlanService $businessPlanService
     * @param CompanyValidation $companyValidation
     */
    public function __construct(
        CompanyRepositoryInterface $companyRepo,
        BusinessPlanService $businessPlanService,
        CompanyValidation $companyValidation)
    {
        $this->companyRepo = $companyRepo;
        $this->businessPlanService = $businessPlanService;
        $this->companyValidation = $companyValidation;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        return $this->companyRepo->getAllPaginate($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $company = $this->companyRepo->getById($id);

        if (is_null($company)) {
            abort(400, __('custom_message.company_not_found'));
        }
        $company->business_plan = $company->business_plan();
        return $company;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm()
    {
        return $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($input)
    {
        return $this->companyRepo->create($input);
    }

    public function validateNew($input)
    {
        return $this->companyValidation->newValidate($input);
    }

    public function validateUpdate($input, $id)
    {
        return $this->companyValidation->updateValidate($input, $id);
    }

    public function handleCompanyNull($company){
        if (is_null($company)) {
            abort(400, __('custom_message.company_not_found'));
        }
    }

    public function getById($id)
    {
        return $this->companyRepo->getById($id);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($company, $input)
    {
        $company->update($input);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($company)
    {
        $company->delete();
    }

}
