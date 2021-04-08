<?php

namespace Modules\Admin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Modules\Core\Validators\BaseValidator;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\AssignLeave\Validators;
 */
class MenusValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'category_name' => 'required',
            'category_link' => 'string|alpha_dash',
            'parent_id' => 'integer'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'category_name' => 'required',
            'category_link' => 'string|alpha_dash',
            'parent_id' => 'integer'
        ],
    ];

}
