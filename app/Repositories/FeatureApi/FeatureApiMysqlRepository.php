<?php

namespace App\Repositories\FeatureApi;

use App\Models\FeatureApi;
use App\Repositories\MyRepository;

class FeatureApiMysqlRepository extends MyRepository implements FeatureApiRepositoryInterface
{
    public function getById($id)
    {
        return FeatureApi::find($id);
    }


    public function getAll()
    {
        return FeatureApi::paginate(config('constants.pagination.items_per_page'));
    }

    public function create($input)
    {
        $featureApi = new FeatureApi($input);
        $featureApi->save();
        return $featureApi;
    }

    public function deleteAll()
    {
        return FeatureApi::truncate();
    }
}
