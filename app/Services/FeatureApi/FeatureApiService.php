<?php

namespace App\Services\FeatureApi;

use App\Repositories\FeatureApi\FeatureApiRepositoryInterface;
use App\Services\Contract\MyService;
use App\Services\RoleHasFeatureApi\RoleHasFeatureApiService;
use Illuminate\Support\Facades\DB;

class FeatureApiService extends MyService
{
    private $featureApiRepo;
    private $roleHasFeatureApiService;

    /**
     * FeatureApiService constructor.
     * @param FeatureApiRepositoryInterface $featureApiRepo
     * @param RoleHasFeatureApiService $roleHasFeatureApiService
     */
    public function __construct(FeatureApiRepositoryInterface $featureApiRepo, RoleHasFeatureApiService $roleHasFeatureApiService)
    {
        $this->featureApiRepo = $featureApiRepo;
        $this->roleHasFeatureApiService = $roleHasFeatureApiService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $list = $this->featureApiRepo->getAll();
        return view('/feature-api/list')->with('list', $list);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $featureApi = $this->featureApiRepo->getById($id);

        if (is_null($featureApi)) {
            abort(400, __('custom_message.feature_api_not_found'));
        }

        try {
            DB::beginTransaction();
            $featureApi->delete();
            $this->roleHasFeatureApiService->deleteByFeatureApiName($featureApi->name);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/feature-api')->with('deleted', true);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAllRoutesToDB()
    {
        $routeCollection = \Route::getRoutes();
        try {
            DB::beginTransaction();
            $this->featureApiRepo->deleteAll();
            foreach ($routeCollection as $value) {
                $input = [];
                $input['api'] = $value->uri();
                $input['name'] = $value->getName();
                if ($input['name'] == '') {
                    $input['name'] = $input['api'] . '-' . rand();
                }
                $this->featureApiRepo->create($input);
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(400, $ex->getMessage());
        }
        return redirect()->intended('/system-admin/feature-api')->with('saved', true);
    }
}
