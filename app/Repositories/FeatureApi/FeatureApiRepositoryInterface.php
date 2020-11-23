<?php
namespace App\Repositories\FeatureApi;

interface FeatureApiRepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function create($input);
    public function update($id, $input);
}
