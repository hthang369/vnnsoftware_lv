<?php

namespace App\Validations;

use App\Validations\ValidationInterface;
use Illuminate\Support\Facades\Validator;

class BusinessPlanValidation implements ValidationInterface {

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateValidate($request, $id = NULL)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:190',
            'maximum_storage_file' => 'required|max:190|numeric',
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
            'name' => 'required|max:190',
            'maximum_storage_file' => 'required|max:190|numeric',
            'description' => 'required|max:500',
        ]);
    }
}
