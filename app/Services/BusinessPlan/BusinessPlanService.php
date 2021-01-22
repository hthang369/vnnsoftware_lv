<?php

namespace App\Services\BusinessPlan;


use App\Models\BusinessPlan;
use App\Repositories\BusinessPlan\BusinessPlanRepositoryInterface;
use App\Services\Contract\MyService;
use App\User;
use App\Validations\BusinessPlanValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BusinessPlanService extends MyService
{
    private $businessPLanRepo;
    private $businessPlanValidation;

    /**
     * BusinessPlanService constructor.
     * @param BusinessPlanRepositoryInterface $roleRepo
     * @param BusinessPlanValidation $businessPlanValidation
     */
    public function __construct(BusinessPlanRepositoryInterface $roleRepo, BusinessPlanValidation $businessPlanValidation)
    {
        $this->businessPLanRepo = $roleRepo;
        $this->businessPlanValidation = $businessPlanValidation;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        return $this->businessPLanRepo->getAllPaginate($request);
    }


    /**
     * @param $input
     * @return mixed
     */
    public function create($input)
    {
        return $this->businessPLanRepo->create($input);
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input)
    {
        return $this->businessPLanRepo->update($id, $input);
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function updateInfoBusinessPlan($id, $input)
    {
        return $this->businessPLanRepo->updateInfoBusinessPlan($id, $input);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getBusinessPlanInfo($id)
    {
        $businessPlan = $this->businessPLanRepo->getBusinessPlan($id);

        if (is_null($businessPlan)) {
            abort(400, __('custom_message.business_plan_not_found'));
        }

        return $businessPlan;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->businessPLanRepo->delete($id);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllBusinessPlan()
    {
        return $this->businessPLanRepo->getAllBusinessPlan();
    }

    public function getAllSortedBusinessPlan($condition){

    }

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function ruleCreateUpdate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:255',
            'maximum_storage' => 'max:255',
            'description' => 'required|max:255',
        ]);
    }

    public function newValidate($input) {
        return $this->businessPlanValidation->newValidate($input);
    }

    public function updateValidate($input) {
        return $this->businessPlanValidation->updateValidate($input);
    }
}

