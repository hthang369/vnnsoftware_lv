<?php

namespace Modules\Admin\Validators;

use Vnnit\Core\Validators\BaseValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\Admin\Validators;
 */
class UsersValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'age'  => 'required|numeric'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:150',
            'email' => 'required|email',
            'roles' => 'required'
        ],
        'change_password' => [
            'current_password' => 'required|password',
            'password' => 'required|current_password:api',
            'password_confirmation' => 'required|confirmed',
        ]
    ];
}
