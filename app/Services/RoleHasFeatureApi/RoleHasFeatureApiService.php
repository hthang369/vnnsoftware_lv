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
            'feature' => 'required|max:255',
            'api' => 'required|max:255',
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

}
