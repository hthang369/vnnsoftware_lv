<?php
namespace App\Repositories\RoleHasFeatureApi;

interface RoleHasFeatureApiRepositoryInterface
{
    public function getById($id);
    public function getByRoleIdAndFeatureApiId($role_id, $feature_api_id);
    public function getAll();
    public function create($input);
    public function update($id, $input);
}
