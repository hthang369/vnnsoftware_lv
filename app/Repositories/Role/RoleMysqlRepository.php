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


    public function getAll()
    {
        return Role::all();
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
}
