<?php

namespace App\Services\Role;


use App\Repositories\Role\RoleRepositoryInterface;
use App\Services\Contract\MyService;
use App\Validations\RoleValidation;
use Illuminate\Http\Request;

class RoleService extends MyService
{
    private $roleRepo;
    private $roleValidation;

    public function __construct(RoleRepositoryInterface $roleRepo, RoleValidation $roleValidation)
    {
        $this->roleRepo = $roleRepo;
        $this->roleValidation = $roleValidation;
    }

    public function list()
    {
        $list = $this->roleRepo->getAll();
        $listApiName = $this->roleRepo->getAllFeatureApiName();

        return view('/role/list')->with(['list' => $list, 'listApiName' => $listApiName]);
    }

    public function detail($id)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(404, 'Page not found');
        }

        return view('/role/detail')->with('role', $role);
    }

    public function newForm()
    {
        return view('/role/add_form');
    }

    public function updateForm($id)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(404, 'Page not found');
        }

        return view('/role/update_form')->with('role', $role);
    }

    public function register(Request $request)
    {

        $validator = $this->roleValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();

        try {

            $role = $this->roleRepo->create($input);
            return redirect()->intended('/system-admin/role/detail/' . $role->id)->with('saved', true);
        } catch (\Exception $ex) {
            abort(500);
        }
    }

    public function update($id, Request $request)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(404, 'Page not found');
        }

        $validator = $this->roleValidation->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $role = $this->roleRepo->update($id, $input);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/role/detail/' . $id)->with('saved', true);
    }

    public function delete($id)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(404, 'Page not found');
        }

        try {

            $this->roleRepo->delete($id);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/role')->with('deleted', true);
    }
}
