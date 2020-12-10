<?php


namespace App\Validations;


use Illuminate\Support\Facades\Validator;

class RoleValidation implements ValidationInterface
{

    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'name' => "required|max:255|unique:role,name,$id,id,deleted_at,NULL",
            'role_rank' => 'required|max:255|numeric',
            'description' => 'max:255',
        ]);
    }

    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'name' => "required|max:255|unique:role,name,NULL,id,deleted_at,NULL",
            'role_rank' => 'required|max:255|numeric',
            'description' => 'max:255',
        ]);
    }
}
