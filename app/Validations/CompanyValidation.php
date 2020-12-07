<?php
namespace App\Validations;

use App\Validations\ValidationInterface;
use Illuminate\Support\Facades\Validator;

class CompanyValidation implements ValidationInterface {

    public function updateValidate($request, $id = NULL)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|max:255|unique:company,email,' . $id,
            'name' => 'required|max:255|unique:company,name,'. $id,
            'business_plan_id' => 'required|max:255',
            'phone' => 'numeric',
            'address' => 'max:255',
        ]);
    }

    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'email' => 'required|email|max:255|unique:company',
            'name' => 'required|max:255|unique:company',
            'business_plan_id' => 'required|max:255',
            'phone' => 'numeric',
            'address' => 'max:255',
        ]);
    }
}
