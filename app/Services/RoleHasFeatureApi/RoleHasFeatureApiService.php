<?php

namespace App\Services\RoleHasFeatureApi;

use App\Repositories\FeatureApi\FeatureApiRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiRepositoryInterface;
use App\Services\Contract\MyService;
use App\Validations\RoleHasFeatureApiValidation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RoleHasFeatureApiService extends MyService
{
    private $roleHasFeatureApiRepo;
    private $roleRepo;
    private $featureApiRepo;
    private $roleHasFeatureApiValidation;

    /**
     * RoleHasFeatureApiService constructor.
     * @param RoleHasFeatureApiRepositoryInterface $roleHasFeatureApiRepo
     * @param RoleRepositoryInterface $roleRepo
     * @param FeatureApiRepositoryInterface $featureApiRepo
     * @param RoleHasFeatureApiValidation $roleHasFeatureApiValidation
     */
    public function __construct(RoleHasFeatureApiRepositoryInterface $roleHasFeatureApiRepo,
                                RoleRepositoryInterface $roleRepo,
                                FeatureApiRepositoryInterface $featureApiRepo,
                                RoleHasFeatureApiValidation $roleHasFeatureApiValidation)
    {
        $this->roleHasFeatureApiRepo = $roleHasFeatureApiRepo;
        $this->roleRepo = $roleRepo;
        $this->featureApiRepo = $featureApiRepo;
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
     * @return JsonResponse
     */
    public function ajaxCheckIsUsedFeatureApi($feature_id)
    {
        $isUsed = !is_null($this->roleHasFeatureApiRepo->getOneByFeatureId($feature_id));
        return response()->json(array('isUsed' => $isUsed), 200);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function setPermissionForm($id)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(400, __('custom_message.role_plan_not_found'));
        }
        $listFeatureApi = $this->featureApiRepo->getJustNeedForPermission();

        $listOldFeatureApi = $this->roleHasFeatureApiRepo->getByRoleId($id);
        $arrayOldFeatureApi = [];
        foreach ($listOldFeatureApi as $item) {
            array_push($arrayOldFeatureApi, $item['feature_api_id']);
        }
        return view('/role-has-feature-api/set_role_form')->with(['arrayOldFeatureApi' => $arrayOldFeatureApi, 'role' => $role, 'listFeatureApi' => $listFeatureApi]);
    }

    /**
     * @param $input
     * @return Validator
     */
    public function updateValidate($input)
    {
        return $this->roleHasFeatureApiValidation->updateValidate($input);
    }

    /**
     * @param $input
     */
    public function create($input)
    {
        $this->roleHasFeatureApiRepo->create($input);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->roleHasFeatureApiRepo->delete($id);
    }
}
