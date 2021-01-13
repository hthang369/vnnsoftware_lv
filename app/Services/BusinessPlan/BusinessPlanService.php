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
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($request)
    {
        $validator = $this->businessPlanValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->intended(route('Business Plan.New.form'))->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {
            $businessPlan = $this->businessPLanRepo->create($input);
            return redirect()->intended('/system-admin/business-plan/detail/' . $businessPlan->id);
        } catch (\Exception $ex) {
            abort(500, $ex->getMessage());
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $businessPlan = $this->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(400, __('custom_message.business_plan_not_found'));
        }

        $validator = $this->businessPlanValidation->updateValidate($request->all());

        if ($validator->fails()) {
            return redirect()->intended('/system-admin/business-plan/new')->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $businessPlan = $this->businessPLanRepo->update($id, $input);
        } catch (\Exception $ex) {
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {

        $businessPlan = $this->getBusinessPlanInfo($id);

        if (is_null($businessPlan)) {
            abort(400, __('custom_message.business_plan_not_found'));
        }

        try {
            $this->businessPLanRepo->delete($id);
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/business-plan');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm()
    {
        return view('/business-plan/add_form', [

        ])->with('isNew', true);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detailForm($id)
    {
        return view('/business-plan/detail', [
            'businessPlan' => $this->getBusinessPlanInfo($id)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateForm($id)
    {
        return view('/business-plan/update_form', [
            'businessPlan' => $this->getBusinessPlanInfo($id)
        ]);
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

}

