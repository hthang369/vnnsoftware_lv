<?php

namespace App\Http\Controllers\RoleHasFeatureApi;

use App\Http\Controllers\Controller;
use App\Services\FeatureApi\FeatureApiService;
use App\Services\Role\RoleService;
use App\Services\RoleHasFeatureApi\RoleHasFeatureApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleHasFeatureApiController extends Controller
{

    private $roleHasFeatureApiService;
    private $roleService;
    private $featureApiService;

    public function __construct(RoleHasFeatureApiService $roleHasFeatureApiService, RoleService $roleService, FeatureApiService $featureApiService)
    {
        $this->roleHasFeatureApiService = $roleHasFeatureApiService;
        $this->roleService = $roleService;
        $this->featureApiService = $featureApiService;
    }

    public function index()
    {
        $list = $this->roleHasFeatureApiService->getAll();
        return view('/role-has-feature-api/list')->with('list', $list);
    }

    public function detail($id)
    {
        $company = $this->roleHasFeatureApiService->getDetailById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        return view('/role-has-feature-api/detail')->with('company', $company);
    }

    public function setRoleForm($id) {
        $role = $this->roleService->getById($id);

        if (is_null($role)) {
            abort(404,'Page not found');
        }

        $listFeatureApi = $this->featureApiService->getAll();
        return view('/role-has-feature-api/add_form')->with(['isNew' => true, 'role' => $role, 'listFeatureApi' => $listFeatureApi]);
    }

    public function setRole(Request $request)
    {

        $validator = $this->roleHasFeatureApiService->ruleCreateUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        try {
            $input['role_id'] = $request->input('role_id');
            $listOld = $this->roleHasFeatureApiService->getByRoleId($input['role_id']);

            DB::beginTransaction();
            if ($request->has('feature_api_id')) {
                foreach ($request->input('feature_api_id') as $item) {
                    $has = false;
                    foreach ($listOld as $value) {
                        if ($item == $value['feature_api_id']) {
                            $has = true;
                            break;
                        }
                    }

                    if (!$has) {
                        $input['feature_api_id'] = $item;
                        $this->roleHasFeatureApiService->create($input);
                    }
                }
            }
            foreach ($listOld as $value) {
                $has = false;
                if ($request->has('feature_api_id')) {
                    foreach ($request->input('feature_api_id') as $item) {
                        if ($item == $value['feature_api_id']) {
                            $has = true;
                            break;
                        }
                    }
                }

                if (!$has) {
                    $this->roleHasFeatureApiService->delete($value['id']);
                }
            }
            DB::commit();
            abort(404);
        } catch (\Exception $ex) {
            DB::rollBack();
//            print_r($input); exit;
            return redirect()->back();
            abort(403);
        }
    }

    public function update($id, Request $request)
    {
        $company = $this->roleHasFeatureApiService->getById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        $validator = $this->roleHasFeatureApiService->ruleCreateUpdate($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = request()->except(['_token', 'role']);

        try {
            $company = $this->roleHasFeatureApiService->update($id, $input);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/role-has-feature-api/detail/' . $id);
    }

    public function delete($id)
    {
        $company = $this->roleHasFeatureApiService->getById($id);

        if (is_null($company)) {
            abort(404,'Page not found');
        }

        try {

            $this->roleHasFeatureApiService->delete($id);
        } catch (\Exception $ex) {
            abort(500);
        }

        return redirect()->intended('/system-admin/role-has-feature-api');
    }
}
