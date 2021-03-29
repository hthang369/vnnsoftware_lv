<?php

namespace Modules\Admin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Modules\Core\Validators\BaseValidator;

/**
 * Class BaseValidator.
 *
 * @package namespace Modules\AssignLeave\Validators;
 */
class PagesValidator extends BaseValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'post_title' => 'required',
            'post_link' => 'required',
            'post_image' => 'mimes:jpg,bmp,png|mimetypes:image/png,image/jpeg,image/bmp'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'post_title' => 'required',
            'post_link' => 'required',
            'post_image' => 'mimes:jpg,bmp,png|mimetypes:image/png,image/jpeg,image/bmp'
        ],
    ];

}
