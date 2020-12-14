<?php

namespace App\Http\Controllers\FeatureApi;

use App\Http\Controllers\Controller;
use App\Services\FeatureApi\FeatureApiService;

class FeatureApiController extends Controller
{

    private $featureApiService;

    public function __construct(FeatureApiService $featureApiService)
    {
        $this->featureApiService = $featureApiService;
    }

    public function index()
    {
        return $this->featureApiService->list();
    }

    public function delete($id)
    {
        return $this->featureApiService->delete($id);
    }

    public function saveAllRoutesToDB()
    {
        return $this->featureApiService->saveAllRoutesToDB();
    }
}
