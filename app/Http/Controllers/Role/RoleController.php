<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use App\Services\BusinessPlan\BusinessPlanService;
use App\Services\role\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private $roleService;
    private $businessPlanService;

    public function __construct(RoleService $roleService, BusinessPlanService $businessPlanService)
    {
        $this->roleService = $roleService;
        $this->businessPlanService = $businessPlanService;
    }

    public function index()
    {
        $list = $this->roleService->getAll();
        return view('/role/list')->with('list', $list);
    }

    public function detail($id)
    {
        $role = $this->roleService->getDetailById($id);

        if (is_null($role)) {
            abort(404,'Page not found');
        }

        return view('/role/detail')->with('role', $role);
    }

    public function newForm() {
        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();
        return view('/role/add_form')->with(['isNew' => true, 'listBusinessPlan' => $listBusinessPlan]);
    }

    public function updateForm($id) {
        $role = $this->roleService->getById($id);

        $listBusinessPlan = $this->businessPlanService->getAllBusinessPlan();

        if (is_null($role)) {
            abort(404,'Page not found');
        }

        return view('/role/add_form')->with(['role' => $role, 'listBusinessPlan' => $listBusinessPlan]);
    }

    public function register(Request $request)
    {

        $validator = $this->roleService->ruleCreateUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {

            $role = $this->roleService->create($input);
            return redirect()->intended('/system-admin/role/detail/' . $role->id);
        } catch (\Exception $ex) {
            abort(500);
        }
    }

    public function update($id, Request $request)
    {
        $role = $this->roleService->getById($id);

        if (is_null($role)) {
            abort(404,'Page not found');
        }

        $validator = $this->roleService->ruleCreateUpdate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $role = $this->roleService->update($id, $input);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/role/detail/' . $id);
    }

    public function delete($id)
    {
        $role = $this->roleService->getById($id);

        if (is_null($role)) {
            abort(404,'Page not found');
        }

        try {

            $this->roleService->delete($id);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/role');
    }
}
