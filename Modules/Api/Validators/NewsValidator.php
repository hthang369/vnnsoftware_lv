<?php

namespace Modules\Api\Validators;

use Modules\Core\Validators\BaseValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\Api\Validators;
 */
class NewsValidator extends BaseValidator
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
            'name' => 'required'
        ],
    ];
}
