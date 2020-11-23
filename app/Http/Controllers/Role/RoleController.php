<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Services\Role\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $list = $this->roleService->getAll();
        return view('/role/list')->with('list', $list);
    }

    public function detail($id)
    {
        $role = $this->roleService->getById($id);

        if (is_null($role)) {
            abort(404,'Page not found');
        }

        return view('/role/detail')->with('role', $role);
    }

    public function newForm() {
        return view('/role/add_form')->with('isNew', true);
    }

    public function updateForm($id) {
        $role = $this->roleService->getById($id);

        if (is_null($role)) {
            abort(404,'Page not found');
        }

        return view('/role/add_form')->with('role', $role);
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
