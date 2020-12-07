<?php

namespace App\Services\Role;


use App\Repositories\Role\RoleRepositoryInterface;
use App\Services\Contract\MyService;
use Illuminate\Support\Facades\Validator;

class RoleService extends MyService
{
    private $roleRepo;

    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    public function getById($id)
    {
        return $this->roleRepo->getById($id);
    }

    public function create($input)
    {
        return $this->roleRepo->create($input);
    }

    public function update($id, $input)
    {
        return $this->roleRepo->update($id, $input);
    }

    public function ruleCreateUpdate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:255',
            'role_rank' => 'required|max:255|numeric',
            'description' => 'max:255',
        ]);
    }

    public function getAll()
    {
        return $this->roleRepo->getAll();
    }

    public function getAllFeature()
    {
        return $this->roleRepo->getAllFeature();
    }

    public function delete($id)
    {
        return $this->roleRepo->delete($id);
    }

}
