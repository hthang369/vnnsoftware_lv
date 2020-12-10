<?php

namespace App\Http\Controllers\FeatureApi;

use App\Http\Controllers\Controller;
use App\Services\FeatureApi\FeatureApiService;
use App\Services\RoleHasFeatureApi\RoleHasFeatureApiService;
use App\Validations\FeatureApiValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeatureApiController extends Controller
{

    private $featureApiService;
    private $roleHasFeatureApiService;

    public function __construct(
        FeatureApiService $featureApiService,
        RoleHasFeatureApiService $roleHasFeatureApiService )
    {
        $this->featureApiService = $featureApiService;
        $this->roleHasFeatureApiService = $roleHasFeatureApiService;
    }

    public function index()
    {
        return $this->featureApiService->index();
    }

    public function detail($id)
    {
        return $this->featureApiService->detail($id);
    }

    public function newForm()
    {
        return $this->featureApiService->newForm();
    }

    public function updateForm($id)
    {
        return $this->featureApiService->updateForm($id);
    }

    public function register(Request $request)
    {
        return $this->featureApiService->create($request);
    }

    public function update($id, Request $request)
    {
       return $this->featureApiService->update($id, $request);
    }

    public function delete($id)
    {
//        $featureApi = $this->featureApiService->getById($id);
//
//        if (is_null($featureApi)) {
//            abort(404, 'Page not found');
//        }
//
//        try {
//            DB::beginTransaction();
//            $this->featureApiService->delete($id);
//            $this->roleHasFeatureApiService->deleteByFeatureApiId($featureApi->id);
//            DB::commit();
//        } catch (\Exception $ex) {
//            DB::rollBack();
//            abort(500);
//        }
//
//        return redirect()->intended('/system-admin/feature-api')->with('deleted', true);

        return $this->featureApiService->delete($id);
    }

    public function saveAllRoutesToDB()
    {
        return $this->featureApiService->saveAllRoutesToDB();
    }

    public function saveAllRoutesToDB()
    {
        return $this->featureApiService->saveAllRoutesToDB();
    }
}
