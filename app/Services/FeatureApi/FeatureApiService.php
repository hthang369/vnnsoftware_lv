<?php

namespace App\Services\FeatureApi;


use App\Repositories\FeatureApi\FeatureApiRepositoryInterface;
use App\Repositories\RoleHasFeatureApi\RoleHasFeatureApiMysqlRepository;
use App\Services\Contract\MyService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeatureApiService extends MyService
{
    private $featureApiRepo;
    private $roleHasFeatureApiRepo;

    public function __construct(FeatureApiRepositoryInterface $featureApiRepo, RoleHasFeatureApiMysqlRepository $roleHasFeatureApiRepo)
    {
        $this->featureApiRepo = $featureApiRepo;
        $this->roleHasFeatureApiRepo = $roleHasFeatureApiRepo;
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

    public function saveAllRoutesToDB()
    {
        $routeCollection = \Route::getRoutes();
//        $listRoleHasFeatureApiWithName = $this->roleHasFeatureApiRepo->getAllByFeatureApiName();
        try {
            DB::beginTransaction();
//            foreach ($listRoleHasFeatureApiWithName as $item) {
//                $has = false;
//                foreach ($routeCollection as $value) {
//                    $value->getName();
//                    if ($item->feature_api_name == $value->getName()) {
//                        $has = true;
//                        break;
//                    }
//                }
//                if (!$has) {
//                    $this->roleHasFeatureApiRepo->deleteByFeatureApiName($item->feature_api_name);
//                }
//            }

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
            abort(500);
        }
    }
}
