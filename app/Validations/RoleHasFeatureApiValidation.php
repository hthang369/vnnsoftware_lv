<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

class RoleHasFeatureApiValidation
{

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateValidate($request)
    {
        return $validator = Validator::make($request, [
            'role_id' => 'required|exists:role,id',
            'feature_api_name' => 'exists:feature_api,name',
        ]);
    }
}
