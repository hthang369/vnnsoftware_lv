<?php

namespace App\Validators\Companys;

use Laka\Core\Validators\BaseValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class CompanyValidator extends BaseValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'email' => "required|email|max:190|unique:company,email",
            'name' => "required|max:190|unique:company,name",
            'business_plan_id' => 'required|max:190',
            'phone' => 'required|digits_between:1,100|numeric',
            'address' => 'required|max:190'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'email' => "required|email|max:190|unique:company,email",
            'name' => "required|max:190|unique:company,name",
            'business_plan_id' => 'required|max:190',
            'phone' => 'required|digits_between:1,100|numeric',
            'address' => 'required|max:190'
        ],
    ];
}
