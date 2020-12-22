<?php
namespace App\Repositories\BusinessPlan;

interface BusinessPlanRepositoryInterface
{
    public function getBusinessPlan($data);
    public function getAllBusinessPlan();
    public function updateInfoBusinessPlan($user_id, $update_data);
    public function create($input);
    public function update($id, $input);
    public function delete($id);
}
