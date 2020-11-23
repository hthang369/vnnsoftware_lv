<?php

namespace App\Services\FeatureApi;


use App\Repositories\FeatureApi\FeatureApiRepositoryInterface;
use App\Services\Contract\MyService;
use Illuminate\Support\Facades\Validator;

class FeatureApiService extends MyService
{
    private $featureApiRepo;

    public function __construct(FeatureApiRepositoryInterface $featureApiRepo)
    {
        $this->featureApiRepo = $featureApiRepo;
    }

    public function getById($id)
    {
        return $this->featureApiRepo->getById($id);
    }

    public function create($input)
    {
        return $this->featureApiRepo->create($input);
    }

    public function update($id, $input)
    {
        return $this->featureApiRepo->update($id, $input);
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
        return $this->featureApiRepo->getAll();
    }

    public function delete($id)
    {
        return $this->featureApiRepo->delete($id);
    }

}
