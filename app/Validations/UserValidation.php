<?php

namespace App\Validations;

use App\Validations\ValidationInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;

class UserValidation implements ValidationInterface {

    use ValidatesRequests;

    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|max:190|unique:users,email,' . $id,
            'password' =>'min:6|max:190',
            'name' => 'required|max:190',
            'phone' => 'numeric',
            'address' => 'max:190',
            'role' => 'required'
        ]);
    }

    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|max:190|unique:users',
            'password' => 'min:6|max:190|required',
            'name' => 'required|max:190',
            'phone' => 'numeric',
            'address' => 'max:190',
            'role' => 'required'
        ]);
    }

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
}
