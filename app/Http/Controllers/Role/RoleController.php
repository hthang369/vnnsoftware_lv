<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Services\Role\RoleService;
use App\Validations\RoleValidation;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private $roleService;

    private $roleValidation;

    public function __construct(RoleService $roleService, RoleValidation $roleValidation)
    {
        $this->roleService = $roleService;
        $this->roleValidation = $roleValidation;
    }

    public function index()
    {
        return $this->roleService->index();
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
        return view('/role/add_form');
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

        $validator = $this->roleValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {

            $role = $this->roleService->create($input);
            return redirect()->intended('/system-admin/role/detail/' . $role->id)->with('saved', true);
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

        $validator = $this->roleValidation->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $role = $this->roleService->update($id, $input);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/role/detail/' . $id)->with('saved', true);
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

        return redirect()->intended('/system-admin/role')->with('deleted', true);
    }
}
