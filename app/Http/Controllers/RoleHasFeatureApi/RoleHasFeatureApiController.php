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

    public function ajaxCheckIsUsedFeatureApi($feature_id)
    {
        $isUsed = $this->roleHasFeatureApiService->checkFeatureApiIsUsed($feature_id);
        return response()->json(array('isUsed'=> $isUsed), 200);
    }

    public function setRoleForm($id)
    {
        $role = $this->roleService->getById($id);

        if (is_null($role)) {
            abort(404, 'Page not found');
        }
        $listFeatureApi = $this->featureApiService->getAll();

        $listOldFeatureApi = $this->roleHasFeatureApiService->getByRoleId($id);
        $arrayOldFeatureApi = [];
        foreach ($listOldFeatureApi as $item) {
            array_push($arrayOldFeatureApi, $item['feature_api_name']);
        }
        return view('/role-has-feature-api/set_role_form')->with(['arrayOldFeatureApi' => $arrayOldFeatureApi, 'role' => $role, 'listFeatureApi' => $listFeatureApi]);
    }

    public function setRole(Request $request)
    {

        $validator = $this->roleHasFeatureApiService->ruleCreateUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }


        try {
            DB::beginTransaction();
            $input['role_id'] = $request->input('role_id');
            $listOldFeatureApi = $this->roleHasFeatureApiService->getByRoleId($input['role_id']);

            if ($request->has('feature_api_name')) {
                foreach ($request->input('feature_api_name') as $item) {
                    $has = false;
                    foreach ($listOldFeatureApi as $value) {
                        if ($item == $value['feature_api_name']) {
                            $has = true;
                            break;
                        }
                    }

                    if (!$has) {
                        $input['feature_api_name'] = $item;
                        $this->roleHasFeatureApiService->create($input);
                    }
                }
            }
            foreach ($listOldFeatureApi as $value) {
                $has = false;
                if ($request->has('feature_api_name')) {
                    foreach ($request->input('feature_api_name') as $item) {
                        if ($item == $value['feature_api_name']) {
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
            return redirect()->back()->with('saved', true);
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(500);
        }
    }
}
