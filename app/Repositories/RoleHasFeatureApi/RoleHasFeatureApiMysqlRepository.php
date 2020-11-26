<?php

namespace App\Repositories\RoleHasFeatureApi;

use App\Models\RoleHasFeatureApi;
use App\Repositories\MyRepository;

class RoleHasFeatureApiMysqlRepository extends MyRepository implements RoleHasFeatureApiRepositoryInterface
{
    public function getById($id)
    {
        return RoleHasFeatureApi::find($id);
    }

    public function getByRoleId($role_id)
    {
        $roleHasFeatureApi = new RoleHasFeatureApi();
        return $roleHasFeatureApi->select("*")->where("role_has_feature_api.role_id", $role_id)->whereNull('role_has_feature_api.deleted_at')->get();
    }


    public function getAll()
    {
        return RoleHasFeatureApi::all();
    }

    public function create($input)
    {
        return RoleHasFeatureApi::create($input);
    }

    public function update($id, $input)
    {
        return RoleHasFeatureApi::where('id', $id)
            ->update($input);
    }

    public function delete($id)
    {
        return RoleHasFeatureApi::where('id', $id)->delete();
    }
}
