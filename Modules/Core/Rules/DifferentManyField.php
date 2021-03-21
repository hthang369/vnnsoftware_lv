<?php

namespace Modules\Core\Rules;

use Illuminate\Contracts\Validation\Rule;


class DifferentManyField implements Rule
{
    private $fields;

    /**
     * DifferentManyField constructor.
     *
     * @param array $fields
     */
    public function __construct($fields = [])
    {
        $this->fields = $fields;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $resultCompare =  array_diff_key( $this->fields , array_unique( $this->fields ) );

        if (!$resultCompare || !$value || !isset($resultCompare[$attribute])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('calendar::calendar.valid_day_off');
    }
}
