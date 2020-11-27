<?php
namespace App\Repositories\RoleHasFeatureApi;

interface RoleHasFeatureApiRepositoryInterface
{
    public function getById($id);
    public function getByRoleId($role_id);
    public function getAll();
    public function create($input);
    public function update($id, $input);
    public function delete($id);
    public function deleteByFeatureApiId($id);
    public function getOneByFeatureId($feature_id);
}
