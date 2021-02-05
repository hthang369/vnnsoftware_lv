<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\MyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleMysqlRepository extends MyRepository implements RoleRepositoryInterface
{
    private $contactable = [
        'role.name' => 'name',
        'role.role_rank' => 'role_rank',
        'role.description' => 'description',
    ];

    public function getById($id)
    {
        return Role::find($id);
    }

    /**
     * @return mixed
     */
    public function getAllPaginate(Request $request)
    {
        $query = Role::query();

        if ($request->has('search')) {
            $query = $this->querySearch($query, $request, $this->contactable);
        }

        if ($request->has('sort')) {
            $query = $this->querySort($query, $request, $this->contactable);
        }

        return $query->paginate(config('constants.pagination.items_per_page'));
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
        return Role::create($input);
    }

    public function update($id, $input)
    {
        return Role::where('id', $id)
            ->update($input);
    }

    public function delete($id)
    {
        return Role::where('id', $id)->delete();
    }

    public function getByName($name)
    {
        $role = new Role();
        return $role->select('*')
            ->where('name', '=', $name)
            ->first();
    }

    public function getRoleUserByRoleId($id)
    {
        return DB::table('role_user')
            ->select('*')
            ->where('role_id', '=', $id)
            ->get();
    }
}
