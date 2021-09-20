<?php

namespace App\Validators\BusinessPlans;

use Laka\Core\Validators\BaseValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class BusinessPlanValidator extends BaseValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:150',
            'maximum_storage_file' => 'required|max:10000000|numeric',
            'description' => 'required|max:500',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:190',
            'maximum_storage_file' => 'nullable|max:10000000|numeric',
            'description' => 'nullable|max:500',
        ],
    ];
}
