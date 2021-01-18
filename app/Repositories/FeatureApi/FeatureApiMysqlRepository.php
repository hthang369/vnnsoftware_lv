<?php

namespace App\Repositories\FeatureApi;

use App\Models\FeatureApi;
use App\Repositories\MyRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FeatureApiMysqlRepository extends MyRepository implements FeatureApiRepositoryInterface
{
    public function getById($id)
    {
        return FeatureApi::find($id);
    }

    public function getAll()
    {
        return FeatureApi::whereNull('deleted_at')->orderBy('feature')->get();
    }

    public function updateOrCreate($input)
    {
        $featureApi = FeatureApi::updateOrCreate(
            ['name' => $input['name'], 'api' => $input['api'], 'feature' => $input['feature']], [
                'deleted_at' => null
            ]
        );
        return $featureApi;
    }

    public function deleteOld($listOldId)
    {
        return DB::table('feature_api')->whereNotIn('id', $listOldId)->update(['deleted_at' => Carbon::now()]);
    }
}
