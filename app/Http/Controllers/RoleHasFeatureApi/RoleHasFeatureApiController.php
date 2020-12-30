<?php

namespace App\Http\Controllers\RoleHasFeatureApi;

use App\Http\Controllers\Controller;
use App\Services\RoleHasFeatureApi\RoleHasFeatureApiService;
use Illuminate\Http\Request;

class RoleHasFeatureApiController extends Controller
{

    private $roleHasFeatureApiService;

    /**
     * RoleHasFeatureApiController constructor.
     * @param RoleHasFeatureApiService $roleHasFeatureApiService
     */
    public function __construct(RoleHasFeatureApiService $roleHasFeatureApiService)
    {
        parent::__construct();
        $this->roleHasFeatureApiService = $roleHasFeatureApiService;
    }

    /**
     * @param $feature_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxCheckIsUsedFeatureApi($feature_id)
    {
        return $this->roleHasFeatureApiService->ajaxCheckIsUsedFeatureApi($feature_id);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setPermissionForm($id)
    {
        return $this->roleHasFeatureApiService->setPermissionForm($id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setPermission(Request $request)
    {
        return $this->roleHasFeatureApiService->setPermission($request);
    }
}
