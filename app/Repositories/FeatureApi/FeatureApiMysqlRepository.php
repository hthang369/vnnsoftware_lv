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
        return FeatureApi::all();
    }

    public function create($input)
    {
        return FeatureApi::create($input);
    }

    public function update($id, $input)
    {
        return FeatureApi::where('id', $id)
            ->update($input);
    }

    public function delete($id)
    {
        return FeatureApi::where('id', $id)->delete();
    }

    public function deleteAll()
    {
        return FeatureApi::truncate();
    }
}
