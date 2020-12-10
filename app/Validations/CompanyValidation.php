<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

class CompanyValidation implements ValidationInterface
{
    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'email' => "required|email|max:255|unique:company,email,NULL,id,deleted_at,NULL",
            'name' => "required|max:255|unique:company,name,NULL,id,deleted_at,NULL",
            'business_plan_id' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
        ]);
    }

    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'email' => "required|email|max:255|unique:company,email,$id,id,deleted_at,NULL",
            'name' => "required|max:255|unique:company,name,$id,id,deleted_at,NULL",
            'business_plan_id' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
        ]);
    }
}
