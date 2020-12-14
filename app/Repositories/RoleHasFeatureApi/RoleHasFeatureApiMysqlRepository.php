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
        return $roleHasFeatureApi->select("role_has_feature_api.*")
            ->join('feature_api', 'role_has_feature_api.feature_api_name', '=', 'feature_api.name')
            ->where("role_has_feature_api.role_id", $role_id)
            ->whereNull('role_has_feature_api.deleted_at')
            ->whereNull('feature_api.deleted_at')
            ->get();
    }

//    public function getAllByFeatureApiName()
//    {
//        $roleHasFeatureApi = new RoleHasFeatureApi();
//        return $roleHasFeatureApi->select("feature_api_name")->distinct()->whereNull('deleted_at')->groupBy('feature_api_name')->get();
//    }

    public function getAll()
    {
        return RoleHasFeatureApi::all();
    }

    public function create($input)
    {
        $roleHasFeatureApi = new RoleHasFeatureApi($input);
        $roleHasFeatureApi->save();
        return $roleHasFeatureApi;
    }

    public function delete($id)
    {
        return RoleHasFeatureApi::where('id', $id)->delete();
    }

//    public function deleteByFeatureApiId($id)
//    {
//        return RoleHasFeatureApi::where('feature_api_id', $id)->delete();
//    }

    public function deleteByFeatureApiName($name)
    {
        return RoleHasFeatureApi::where('feature_api_name', $name)->delete();
    }

    public function getOneByFeatureId($feature_id)
    {
        return RoleHasFeatureApi::where('feature_api_id', $feature_id)->first();
    }
}
