<?php

namespace App\Presenters\Companys;

use App\Presenters\BaseGridPresenter;
use App\Repositories\BusinessPlans\BusinessPlanRepository;

class CompanyGridPresenter extends BaseGridPresenter
{
    protected function setColumns()
    {
        return [
            'name',
            'email',
            'phone',
            'address',
            [
                'key' => 'business_plan_id',
                // 'filtering' => true,
                'lookup' => [
                    'dataSource' => resolve(BusinessPlanRepository::class)->all(),
                    'displayExpr' => 'name',
                    'valueExpr' => 'id'
                ]
            ]
        ];
    }
}
