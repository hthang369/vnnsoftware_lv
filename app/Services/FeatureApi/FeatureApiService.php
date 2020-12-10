<?php

namespace App\Services\FeatureApi;

use App\Repositories\FeatureApi\FeatureApiRepositoryInterface;
use App\Services\Contract\MyService;
use Illuminate\Support\Facades\DB;

class FeatureApiService extends MyService
{
    private $featureApiRepo;

    public function __construct(FeatureApiRepositoryInterface $featureApiRepo)
    {
        $this->featureApiRepo = $featureApiRepo;
    }

    public function list()
    {
        $list = $this->featureApiRepo->getAll();
        return view('/feature-api/list')->with('list', $list);
    }

    public function delete($id)
    {
        $featureApi = $this->getById($id);

        if (is_null($featureApi)) {
            abort(400, __('custom_message.feature_api_not_found'));
        }

        try {
            DB::beginTransaction();
            $this->featureApiRepo->delete($id);
            $this->roleHasFeatureApiService->deleteByFeatureApiId($featureApi->id);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(400, $ex->getMessage());
        }

        return redirect()->intended('/system-admin/feature-api')->with('deleted', true);
    }

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
