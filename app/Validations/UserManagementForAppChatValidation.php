<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

class UserManagementForAppChatValidation implements ValidationInterface
{
    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'email' => "required|email|max:190",
            'name' => "required|max:190",
            'company_id' => 'required|max:190',
            'c_password' => 'max:190',
            'password' => 'min:6|required_with:c_password|same:c_password',
        ]);
    }

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'email' => "required|email|max:190",
            'name' => "required|max:190",
            'company_id' => 'required|max:190',
            'c_password' => 'max:190',
            'password' => 'min:6|required_with:c_password|same:c_password',
        ]);
    }
}
