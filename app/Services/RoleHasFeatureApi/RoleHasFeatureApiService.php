<?php

namespace App\Services\RoleHasFeatureApi;


use App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiRepositoryInterface;
use App\Services\Contract\MyService;
use Illuminate\Support\Facades\Validator;

class RoleHasFeatureApiService extends MyService
{
    private $roleHasFeatureApiRepo;

    public function __construct(RoleHasFeatureApiRepositoryInterface $roleHasFeatureApiRepo)
    {
        $this->roleHasFeatureApiRepo = $roleHasFeatureApiRepo;
    }

    public function getById($id)
    {
        return $this->roleHasFeatureApiRepo->getById($id);
    }

    public function getByRoleId($role_id)
    {
        return $this->roleHasFeatureApiRepo->getByRoleId($role_id);
    }

    public function create($input)
    {
        return $this->roleHasFeatureApiRepo->create($input);
    }

    public function update($id, $input)
    {
        return $this->roleHasFeatureApiRepo->update($id, $input);
    }

    public function ruleCreateUpdate($request)
    {
        return $validator = Validator::make($request, [
            'role_id' => 'required|exists:role,id',
            'feature_api_id' => 'exists:feature_api,id',
        ]);
    }

    public function getAll()
    {
        return $this->roleHasFeatureApiRepo->getAll();
    }

    public function delete($id)
    {
        return $this->roleHasFeatureApiRepo->delete($id);
    }

    public function checkFeatureApiIsUsed($feature_id)
    {
        return !is_null($this->roleHasFeatureApiRepo->getOneByFeatureId($feature_id));
    }

}
