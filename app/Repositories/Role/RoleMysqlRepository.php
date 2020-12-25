<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\MyRepository;

class RoleMysqlRepository extends MyRepository implements RoleRepositoryInterface
{

    public function getById($id)
    {
        return Role::find($id);
    }

    public function getAllPaginate()
    {
        return Role::paginate(config('constants.pagination.items_per_page'));
    }

    public function getAll()
    {
        return Role::all();
    }

    public function getAllFeatureApiName()
    {
        $role = new Role();
        return $role->select('role.id as role_id', 'feature_api.*')
            ->whereNull('role.deleted_at')
            ->whereNull('role_has_feature_api.deleted_at')
            ->whereNull('feature_api.deleted_at')
            ->join('role_has_feature_api', 'role.id', '=', 'role_has_feature_api.role_id')
            ->join('feature_api', 'role_has_feature_api.feature_api_id', '=', 'feature_api.id')
            ->get();
    }

    public function create($input)
    {
        $role = new Role($input);
        $role->save();
        return $role;
    }

    public function getByName($name)
    {
        $role = new Role();
        return $role->select('*')
            ->where('name', '=', $name)
            ->first();
    }
}
