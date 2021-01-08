<?php
namespace App\Repositories\BusinessPlan;

use Illuminate\Http\Request;

interface BusinessPlanRepositoryInterface
{
    public function getBusinessPlan($data);
    public function getAllBusinessPlan();
    public function getAllPaginate(Request $request);
    public function updateInfoBusinessPlan($user_id, $update_data);
    public function create($input);
    public function update($id, $input);
    public function delete($id);
}
