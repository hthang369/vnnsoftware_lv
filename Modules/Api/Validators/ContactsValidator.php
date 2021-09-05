<?php

namespace Modules\Api\Validators;

use Modules\Core\Validators\BaseValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\Api\Validators;
 */
class ContactsValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'email'  => 'required|email',
            'subject'  => 'required',
            'message'  => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
        ],
    ];
}
