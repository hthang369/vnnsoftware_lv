<?php


namespace App\Validations;


use Illuminate\Support\Facades\Validator;

class RoleValidation implements ValidationInterface
{

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'name' => "required|max:190|unique:role,name,$id,id,deleted_at,NULL",
            'role_rank' => 'required|max:190|numeric',
            'description' => 'required|max:500',
        ]);
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'name' => "required|max:190|unique:role,name,NULL,id,deleted_at,NULL",
            'role_rank' => 'required|max:190|numeric',
            'description' => 'required|max:500',
        ]);
    }
}
