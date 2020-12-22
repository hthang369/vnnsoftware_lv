<?php

namespace App\Repositories\RoleHasFeatureApi;

use App\Models\RoleHasFeatureApi;
use App\Repositories\MyRepository;
use Illuminate\Support\Facades\DB;

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
            ->join('feature_api', 'role_has_feature_api.feature_api_id', '=', 'feature_api.id')
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

    public function deleteByFeatureApiId($id)
    {
        return RoleHasFeatureApi::where('feature_api_id', $id)->delete();
    }

    public function deleteByFeatureApiName($name)
    {
        return RoleHasFeatureApi::where('feature_api_name', $name)->delete();
    }

    public function getOneByFeatureId($feature_id)
    {
        return RoleHasFeatureApi::where('feature_api_id', $feature_id)->first();
    }

    public function getListFeatureApiNameByUserId($user_id)
    {
        return DB::table('role_has_feature_api')->select("role_has_feature_api.feature_api_id")
            ->join('role', 'role.id', '=', 'role_has_feature_api.role_id')
            ->join('role_user', 'role_user.role_id', '=', 'role.id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->where("users.id", $user_id)
            ->whereNull('role_has_feature_api.deleted_at')
            ->whereNull('role.deleted_at')
            ->whereNull('users.deleted_at')
            ->distinct()
            ->get();
    }
}
