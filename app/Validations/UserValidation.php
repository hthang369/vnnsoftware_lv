<?php

namespace App\Validations;


use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserValidation implements ValidationInterface {

    use ValidatesRequests;

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|max:190|unique:users,email,' . $id . ',id,deleted_at,NULL',
            'password' =>'nullable|min:6|max:190|regex:/^\S*$/u',
            'name' => 'required|max:190',
            'phone' => 'numeric|nullable',
            'address' => 'max:190',
            'role' => ''
        ]);
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function newValidate($request, $id = NULL)
    {
        return $validator = Validator::make($request, [
            'email'=>['required','email','max:190', Rule::unique('users')->whereNull("deleted_at")],
            'password' => 'min:6|max:190|required|regex:/^\S*$/u',
            'name' => 'required|max:190',
            'phone' => 'numeric|nullable',
            'address' => 'max:190',
            'role' => ''
        ]);
    }

    /**
     * @param $request
     * @throws ValidationException
     */
    public function loginValidate($request)
    {
        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ];

        $messages = [
            'email.required' => 'The email is required.',
            'email.email' => 'The email needs to have a valid format.',
            //'email.exists' => 'The email is not registered in the system.',
        ];


        $this->validate($request, $rules, $messages);
    }

    /**
     * @param $request
     * @throws ValidationException
     */
    public function changePasswordValidate($request)
    {
        $rules = [
            'newPassword' => 'same:confirmPassword|required',
            'confirmPassword' => 'same:newPassword',
        ];

        $messages = [
            'same' => 'The :attribute and :other must match.',
        ];


        $this->validate($request, $rules, $messages);
    }
}
