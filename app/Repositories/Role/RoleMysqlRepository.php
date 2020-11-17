<?php

namespace App\Repositories\Role;

use App\Repositories\MyRepository;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleMysqlRepository extends MyRepository implements RoleRepositoryInterface
{
    public function Create($input)
    {
        return Role::create($input);
    }

    public function update($id, $input)
    {
        return Role::where('id', $id)
            ->update($input);
    }

    public function getRole($data)
    {
        switch ($data['type']) {
            case "id":
                return Role::select(['id', 'name', 'role_rank', 'description'])->find($data['id']);
                break;
        }
    }

    public function getAllRole($data)
    {
        return Role::all();
    }

    public function updateInfoRole($role_id, $update_data)
    {
        $role = Role::where('id', $role_id);

        $role->update(
            [
                'name' => $update_data->input('name'),
                'role_rank' => $update_data->input('role_rank'),
                'description' => $update_data->input('description'),
            ]);
        return Role::select(['id', 'name', 'role_rank', 'description'])->find($role_id);
    }
}
