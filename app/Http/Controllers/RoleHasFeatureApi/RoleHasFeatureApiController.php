<?php

namespace App\Http\Controllers\RoleHasFeatureApi;

use App\Http\Controllers\Controller;
use App\Services\RoleHasFeatureApi\RoleHasFeatureApiService;
use Illuminate\Http\Request;

class RoleHasFeatureApiController extends Controller
{

    private $roleHasFeatureApiService;

    public function __construct(RoleHasFeatureApiService $roleHasFeatureApiService)
    {
        $this->roleHasFeatureApiService = $roleHasFeatureApiService;
    }

    public function ajaxCheckIsUsedFeatureApi($feature_id)
    {
        return $this->roleHasFeatureApiService->ajaxCheckIsUsedFeatureApi($feature_id);
    }

    public function setPermissionForm($id)
    {
        return $this->roleHasFeatureApiService->setPermissionForm($id);
    }

    public function setPermission(Request $request)
    {
        return $this->roleHasFeatureApiService->setPermission($request);
    }
}
