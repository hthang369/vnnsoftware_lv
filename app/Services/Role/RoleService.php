<?php

namespace App\Services\Role;


use App\Repositories\Role\RoleRepositoryInterface;
use App\Models\Role;
use App\Services\Contract\MyService;
use Illuminate\Support\Facades\DB;

class RoleService extends MyService
{
    private $roleRepo;

    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    public function Create($input)
    {
        return $this->roleRepo->Create($input);
    }

    public function update($id, $input)
    {
        return $this->roleRepo->update($id, $input);
    }

    public function updateInfoRole($id, $input)
    {
        return $this->roleRepo->updateInfoRole($id, $input);
    }

    public function getRoleInfo($id)
    {
        return Role::find($id);
    }

    public function getAllRole()
    {
        return DB::table('role')->get();
    }

}
