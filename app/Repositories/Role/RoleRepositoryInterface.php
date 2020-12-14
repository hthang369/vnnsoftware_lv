<?php
namespace App\Repositories\Role;

interface RoleRepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function getAllPaginate();
    public function getAllFeatureApiName();
    public function create($input);
}
