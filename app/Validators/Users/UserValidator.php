<?php

namespace App\Validators\Users;

use App\Core\Validators\BaseValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class UserValidator extends BaseValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email'
        ],
    ];
}