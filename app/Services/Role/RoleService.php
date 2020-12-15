<?php

namespace App\Services\Role;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Services\Contract\MyService;
use App\Validations\RoleValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $list = $this->roleRepo->getAllPaginate();
        $listApiName = $this->roleRepo->getAllFeatureApiName();

        return view('/role/list')->with(['list' => $list, 'listApiName' => $listApiName]);
    }

    public function detail($id)
    {
        $role = $this->roleRepo->getById($id);
        $role->role_has_feature_api = $role->role_has_feature_api()->get();

        if (is_null($role)) {
            abort(400, __('custom_message.role_plan_not_found'));
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
            abort(400, __('custom_message.role_plan_not_found'));
        }

        return view('/role/update_form')->with('role', $role);
    }

    public function create(Request $request)
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
            abort(400,$ex->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(400, __('custom_message.role_plan_not_found'));
        }

        $validator = $this->roleValidation->updateValidate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $role = $this->roleRepo->update($id, $input);
        } catch (\Exception $ex) {
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/role/detail/' . $id)->with('saved', true);

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
            abort(400, $ex->getMessage());
        }
    }

    public function ruleCreateUpdate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:255',
            'role_rank' => 'required|max:255|numeric',
            'description' => 'max:255',
        ]);
    }

    public function getAll()
    {
        return $this->roleRepo->getAll();
    }

    public function getAllFeatureApiName()
    {
        return $this->roleRepo->getAllFeatureApiName();
    }

    public function delete($id)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(400, __('custom_message.role_plan_not_found'));
        }
        DB::beginTransaction();
        try {

            $role->delete();
            $role->role_has_feature_api()->delete();
            $role->role_user()->delete();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/role')->with('deleted', true);
    }
}
