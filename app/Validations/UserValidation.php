<?php

namespace App\Validations;

use App\Validations\ValidationInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;

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
            'email' => 'required|email|max:190|unique:users,email,' . $id,
            'password' =>'min:6|max:190|required|regex:/^\S*$/u',
            'name' => 'required|max:190',
            'phone' => 'numeric|nullable',
            'address' => 'max:190',
            'role' => 'required'
        ]);
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|max:190|unique:users',
            'password' => 'min:6|max:190|required|regex:/^\S*$/u',
            'name' => 'required|max:190',
            'phone' => 'numeric|nullable',
            'address' => 'max:190',
            'role' => 'required'
        ]);
    }

    /**
     * @param $request
     * @throws \Illuminate\Validation\ValidationException
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
     * @throws \Illuminate\Validation\ValidationException
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
