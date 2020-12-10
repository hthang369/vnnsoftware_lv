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

    public function __construct(RoleHasFeatureApiRepositoryInterface $roleHasFeatureApiRepo, RoleRepositoryInterface $roleRepo, FeatureApiMysqlRepository $featureApiMysqlRepository, RoleHasFeatureApiValidation $roleHasFeatureApiValidation)
    {
        $this->roleHasFeatureApiRepo = $roleHasFeatureApiRepo;
        $this->roleRepo = $roleRepo;
        $this->featureApiMysqlRepository = $featureApiMysqlRepository;
        $this->roleHasFeatureApiValidation = $roleHasFeatureApiValidation;
    }

    public function getByRoleId($role_id)
    {
        return $this->roleHasFeatureApiRepo->getByRoleId($role_id);
    }

    public function deleteByFeatureApiId($id)
    {
        return $this->roleHasFeatureApiRepo->deleteByFeatureApiId($id);
    }

    public function ajaxCheckIsUsedFeatureApi($feature_id)
    {
        $isUsed = !is_null($this->roleHasFeatureApiRepo->getOneByFeatureId($feature_id));
        return response()->json(array('isUsed' => $isUsed), 200);
    }

    public function setPermissionForm($id)
    {
        $role = $this->roleRepo->getById($id);

        if (is_null($role)) {
            abort(404, 'Page not found');
        }
        $listFeatureApi = $this->featureApiMysqlRepository->getAll();

        $listOldFeatureApi = $this->roleHasFeatureApiRepo->getByRoleId($id);
        $arrayOldFeatureApi = [];
        foreach ($listOldFeatureApi as $item) {
            array_push($arrayOldFeatureApi, $item['feature_api_name']);
        }
        return view('/role-has-feature-api/set_role_form')->with(['arrayOldFeatureApi' => $arrayOldFeatureApi, 'role' => $role, 'listFeatureApi' => $listFeatureApi]);
    }

    public function setPermission(Request $request)
    {

        $validator = $this->roleHasFeatureApiValidation->updateValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('mess', true);
        }

        try {
            DB::beginTransaction();
            $input['role_id'] = $request->input('role_id');
            $listOldFeatureApi = $this->roleHasFeatureApiRepo->getByRoleId($input['role_id']);

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
                        $this->roleHasFeatureApiRepo->create($input);
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
                    $this->roleHasFeatureApiRepo->delete($value['id']);
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
