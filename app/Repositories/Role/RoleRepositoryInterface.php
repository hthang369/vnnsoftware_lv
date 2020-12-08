<?php
namespace App\Repositories\Role;

interface RoleRepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function getAllFeatureApiName();
    public function create($input);
    public function update($id, $input);
}
