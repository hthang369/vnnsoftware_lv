<?php

namespace App\Validations;

use App\Validations\ValidationInterface;
use Illuminate\Support\Facades\Validator;

class BusinessPlanValidation implements ValidationInterface {

    public function updateValidate($request, $id = NULL)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:255',
            'maximum_storage' => 'max:255|numeric',
            'description' => 'required|max:255',
        ]);
    }

    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'name' => 'required|max:255',
            'maximum_storage' => 'max:255|numeric',
            'description' => 'required|max:255',
        ]);
    }
}
