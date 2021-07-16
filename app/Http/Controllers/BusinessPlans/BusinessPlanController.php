<?php

namespace App\Http\Controllers\BusinessPlans;

use App\Core\Http\Controllers\BaseController;
use App\Repositories\BusinessPlans\BusinessPlanRepository;
use App\Validators\BusinessPlans\BusinessPlanValidator;
use Illuminate\Support\Facades\View;

/**
 * Class BusinessPlanController
 * @package App\Http\Controllers\BusinessPlans
 * @property BusinessPlanRepository businessplanRepository
 */
class BusinessPlanController extends BaseController
{
    protected $listViewName = [
        'index'     => 'business-plan.list',
        'create'    => 'business-plan.add_form',
    ];

    public function __construct(BusinessPlanValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(BusinessPlanRepository::class);

        View::share('titlePage', 'Chi tiết công ty');
        View::share('headerPage', 'custom_title.business_plan');
        View::share('sectionCode', $this->getSectionCode());
    }
}
