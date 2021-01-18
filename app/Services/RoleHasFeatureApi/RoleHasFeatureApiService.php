<?php

namespace App\Services\RoleHasFeatureApi;

use App\Repositories\FeatureApi\FeatureApiMysqlRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiRepositoryInterface;
use App\Services\Contract\MyService;
use App\Validations\RoleHasFeatureApiValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleHasFeatureApiService extends MyService
{
    private $roleHasFeatureApiRepo;
    private $roleRepo;
    private $featureApiMysqlRepository;
    private $roleHasFeatureApiValidation;

    /**
     * RoleHasFeatureApiService constructor.
     * @param RoleHasFeatureApiRepositoryInterface $roleHasFeatureApiRepo
     * @param RoleRepositoryInterface $roleRepo
     * @param FeatureApiMysqlRepository $featureApiMysqlRepository
     * @param RoleHasFeatureApiValidation $roleHasFeatureApiValidation
     */
    public function __construct(RoleHasFeatureApiRepositoryInterface $roleHasFeatureApiRepo, RoleRepositoryInterface $roleRepo, FeatureApiMysqlRepository $featureApiMysqlRepository, RoleHasFeatureApiValidation $roleHasFeatureApiValidation)
    {
        $this->roleHasFeatureApiRepo = $roleHasFeatureApiRepo;
        $this->roleRepo = $roleRepo;
        $this->featureApiMysqlRepository = $featureApiMysqlRepository;
        $this->roleHasFeatureApiValidation = $roleHasFeatureApiValidation;
    }

    /**
     * @param $role_id
     * @return mixed
     */
    public function getByRoleId($role_id)
    {
        return $this->roleHasFeatureApiRepo->getByRoleId($role_id);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function deleteByFeatureApiId($name)
    {
        return $this->roleHasFeatureApiRepo->deleteByFeatureApiId($name);
    }

    /**
     * @param $feature_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxCheckIsUsedFeatureApi($feature_id)
    {
        $isUsed = !is_null($this->roleHasFeatureApiRepo->getOneByFeatureId($feature_id));
        return response()->json(array('isUsed' => $isUsed), 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setPermissionForm($id)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(400, __('custom_message.role_plan_not_found'));
        }
        $listFeatureApi = $this->featureApiMysqlRepository->getAll();

        $listOldFeatureApi = $this->roleHasFeatureApiRepo->getByRoleId($id);
        $arrayOldFeatureApi = [];
        foreach ($listOldFeatureApi as $item) {
            array_push($arrayOldFeatureApi, $item['feature_api_id']);
        }
        return view('/role-has-feature-api/set_role_form')->with(['arrayOldFeatureApi' => $arrayOldFeatureApi, 'role' => $role, 'listFeatureApi' => $listFeatureApi]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setPermission(Request $request)
    {

        $validator = $this->roleHasFeatureApiValidation->updateValidate($request->all());

        if ($validator->fails()) {
            return redirect()->intended('/system-admin/role/set-permission/' . $request->input('role_id'))->withInput()->with('mess', true);
        }

        $role = $this->roleRepo->getById($request->input('role_id'));
        if ($role->name == config('constants.name.role_permission_name')) {
            return redirect()->back()->with('errorCommon', __('custom_message.warning_role_system'));
        }

        try {
            DB::beginTransaction();
            $input['role_id'] = $request->input('role_id');
            $listOldFeatureApi = $this->roleHasFeatureApiRepo->getByRoleId($input['role_id']);

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
                        $this->roleHasFeatureApiRepo->create($input);
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
                    $this->roleHasFeatureApiRepo->delete($value['id']);
                }
            }
            DB::commit();
            return redirect()->intended('/system-admin/role/set-permission/' . $request->input('role_id'))->with('saved', true);
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(400, $ex->getMessage());
        }
    }
}
