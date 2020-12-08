<?php


namespace App\Validations;


use Illuminate\Support\Facades\Validator;

class RoleValidation implements ValidationInterface
{

    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:255|unique:role,name,' . $id,
            'role_rank' => 'required|max:255|numeric',
            'description' => 'max:255',
        ]);
    }

    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:255|unique:role',
            'role_rank' => 'required|max:255|numeric',
            'description' => 'max:255',
        ]);
    }
}
