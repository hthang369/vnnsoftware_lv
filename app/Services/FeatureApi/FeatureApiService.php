<?php

namespace App\Services\FeatureApi;

use App\Repositories\FeatureApi\FeatureApiRepositoryInterface;
use App\Services\Contract\MyService;
use App\Services\RoleHasFeatureApi\RoleHasFeatureApiService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Route;

class FeatureApiService extends MyService
{
    private $featureApiRepo;

    /**
     * FeatureApiService constructor.
     * @param FeatureApiRepositoryInterface $featureApiRepo
     */
    public function __construct(FeatureApiRepositoryInterface $featureApiRepo)
    {
        $this->featureApiRepo = $featureApiRepo;
    }

    /**
     * @return RedirectResponse
     */
    public function saveAllRoutesToDB()
    {
        $routeCollection = Route::getRoutes();
        try {
            $listOldId = [];
            DB::beginTransaction();
            foreach ($routeCollection as $value) {
                $name = $value->getName();
                if ($name == null || strpos($name, 'form')) {
                    continue;
                }
                $input = [];
                $input['feature'] = substr($name, 0, strpos($name, '.'));
                $input['api'] = $value->uri();
                $input['name'] = substr($name, strpos($name, '.') + 1, strpos(str_replace( $input['feature'] . '.', '', $name ), '.'));

                if ($input['feature'] == null) {
                    $input['feature'] = 'Empty';
                }

                if ($input['name'] == null) {
                    $input['name'] = str_replace( $input['feature'] . '.', '', $name );
                }

                $featureApi = $this->featureApiRepo->updateOrCreate($input);
                array_push($listOldId, $featureApi->id);
            }
            $this->featureApiRepo->deleteOld($listOldId);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            abort(400, $ex->getMessage());
        }
        return redirect()->intended('/system-admin/feature-api')->with('saved', true);
    }

    public function getJustNeedForPermission() {
        return $this->featureApiRepo->getJustNeedForPermission();
    }
}
