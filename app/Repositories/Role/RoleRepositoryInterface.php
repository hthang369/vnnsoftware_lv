<?php
namespace App\Repositories\Role;

use Illuminate\Http\Request;

interface RoleRepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function getAllPaginate(Request $request);
    public function getAllFeatureApiName();
    public function create($input);
    public function getRoleUserByRoleId($id);
}
