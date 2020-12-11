<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

class CompanyValidation implements ValidationInterface
{
    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'email' => "required|email|max:190|unique:company,email,NULL,id,deleted_at,NULL",
            'name' => "required|max:190|unique:company,name,NULL,id,deleted_at,NULL",
            'business_plan_id' => 'required|max:190',
            'phone' => 'max:190',
            'address' => 'max:190',
        ]);
    }

    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'email' => "required|email|max:190|unique:company,email,$id,id,deleted_at,NULL",
            'name' => "required|max:190|unique:company,name,$id,id,deleted_at,NULL",
            'business_plan_id' => 'required|max:190',
            'phone' => 'max:190',
            'address' => 'max:190',
        ]);
    }
}
