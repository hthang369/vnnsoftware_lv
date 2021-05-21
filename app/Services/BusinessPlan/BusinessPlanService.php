<?php

namespace App\Services\BusinessPlan;


use App\Models\BusinessPlan;
use App\Repositories\BusinessPlan\BusinessPlanRepositoryInterface;
use App\Services\Contract\MyService;
use App\User;
use App\Validations\BusinessPlanValidation;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

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
     * @return Application|Factory|View
     */
    public function list(Request $request)
    {
        return $this->businessPLanRepo->getAllPaginate($request);
    }


    /**
     * @param $request
     * @return RedirectResponse
     */
    public function create($request)
    {
        return $businessPlan = $this->businessPLanRepo->create($request);
    }
    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, $input)
    {
        $businessPlan = $this->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(400, __('custom_message.business_plan_not_found'));
        }

        $validator = $this->businessPlanValidation->updateValidate($input);

        if ($validator->fails()) {
            return redirect()->intended('/system-admin/business-plan/new')->withInput()->withErrors($validator->errors());
        }

        try {
            $businessPlan = $this->businessPLanRepo->update($id, $input);
        } catch (Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/business-plan/detail/' . $id);
        //return $this->businessPLanRepo->update($id, $input);
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
     * @return RedirectResponse
     */
    public function delete($id)
    {

        $businessPlan = $this->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(400, __('custom_message.business_plan_not_found'));
        }

        try {
            $this->businessPLanRepo->delete($id);
        } catch (Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/business-plan/list');
    }


    /**
     * @return Application|Factory|View
     */
    public function newForm()
    {
        return view('/business-plan/add_form', [

        ])->with('isNew', true);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function detailForm($id)
    {
        return view('/business-plan/detail', [
            'businessPlan' => $this->getBusinessPlanInfo($id)
        ]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function updateForm($id)
    {
        return view('/business-plan/update_form', [
            'businessPlan' => $this->getBusinessPlanInfo($id)
        ]);
    }

    /**
     * @return Collection
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

