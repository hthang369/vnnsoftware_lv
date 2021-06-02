<?php

namespace App\Http\Controllers\RoleHasFeatureApi;

use App\Http\Controllers\Controller;
use App\Repositories\FeatureApi\FeatureApiRepositoryInterface;
use App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiRepositoryInterface;
use App\Services\FeatureApi\FeatureApiService;
use App\Services\Role\RoleService;
use App\Services\RoleHasFeatureApi\RoleHasFeatureApiService;
use App\Validations\RoleHasFeatureApiValidation;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RoleHasFeatureApiController extends Controller
{

    private $roleHasFeatureApiService;
    private $roleService;
    private $featureApiService;
    private $roleHasFeatureApiValidation;


    /**
     * RoleHasFeatureApiController constructor.
     * @param RoleHasFeatureApiService $roleHasFeatureApiService
     * @param RoleService $roleService
     * @param FeatureApiService $featureApiService
     * @param RoleHasFeatureApiValidation $roleHasFeatureApiValidation
     * @param RoleHasFeatureApiRepositoryInterface $roleHasFeatureApiRepo
     */
    public function __construct(
        RoleHasFeatureApiService $roleHasFeatureApiService,
        RoleService $roleService,
        FeatureApiService $featureApiService,
        RoleHasFeatureApiValidation $roleHasFeatureApiValidation )
    {
        parent::__construct();
        $this->roleHasFeatureApiService = $roleHasFeatureApiService;
        $this->roleService = $roleService;
        $this->featureApiService = $featureApiService;
        $this->roleHasFeatureApiValidation = $roleHasFeatureApiValidation;
    }

    /**
     * @param $feature_id
     * @return JsonResponse
     */
    public function ajaxCheckIsUsedFeatureApi($feature_id)
    {
        return $this->roleHasFeatureApiService->ajaxCheckIsUsedFeatureApi($feature_id);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function setPermissionForm($id)
    {
        $role = $this->roleService->getById($id);

        if (is_null($role)) {
            abort(400, __('custom_message.role_plan_not_found'));
        }
        $listFeatureApi = $this->featureApiService->getJustNeedForPermission();

        $listOldFeatureApi = $this->roleHasFeatureApiService->getByRoleId($id);
        $arrayOldFeatureApi = [];
        foreach ($listOldFeatureApi as $item) {
            array_push($arrayOldFeatureApi, $item['feature_api_id']);
        }
        return view('/role-has-feature-api/set_role_form')
            ->with([
                'arrayOldFeatureApi' => $arrayOldFeatureApi,
                'role' => $role,
                'listFeatureApi' => $listFeatureApi
            ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function setPermission(Request $request)
    {
        $validator = $this->roleHasFeatureApiService->updateValidate($request->all());

        if ($validator->fails()) {
            return redirect()->intended('/system-admin/role/set-permission/' . $request->input('role_id'))->withInput()->with('mess', true);
        }

        $role = $this->roleService->getById($request->input('role_id'));
        if ($role->name == config('constants.name.role_permission_name')) {
            return redirect()->back()->with('errorCommon', __('custom_message.warning_role_system'));
        }

        try {
            DB::beginTransaction();
            $input['role_id'] = $request->input('role_id');
            $listOldFeatureApi = $this->roleHasFeatureApiService->getByRoleId($input['role_id']);

            if ($request->has('feature_api_id')) {
                foreach ($request->input('feature_api_id') as $item) {
                    $has = false;
                    foreach ($listOldFeatureApi as $value) {
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
            foreach ($listOldFeatureApi as $value) {
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
            return redirect()->intended('/system-admin/role/set-permission/' . $request->input('role_id'))->with('saved', true);
        } catch (Exception $ex) {
            DB::rollBack();
            abort(400, $ex->getMessage());
        }
    }
}
