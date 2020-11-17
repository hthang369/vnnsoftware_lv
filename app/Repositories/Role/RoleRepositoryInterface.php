<?php
namespace App\Repositories\Role;

interface RoleRepositoryInterface
{
    public function getRole($data);
    public function getAllRole($data);
    public function updateInfoRole($user_id, $update_data);
    public function create($input);
    public function update($id, $input);
}
