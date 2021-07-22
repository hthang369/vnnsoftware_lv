<?php

namespace App\Presenters\Companys;

use App\Presenters\BaseGridPresenter;

class CompanyGridPresenter extends BaseGridPresenter
{
    protected function setColumns()
    {
        return [
            'name',
            'email',
            'phone',
            'address',
            'business_plan_name'
        ];
    }
}
