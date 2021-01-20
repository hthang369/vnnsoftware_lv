<?php
namespace App\Repositories\FeatureApi;

interface FeatureApiRepositoryInterface
{
    public function getById($id);
    public function getJustNeedForPermission();
    public function updateOrCreate($input);
    public function deleteOld($listOldId);
}
