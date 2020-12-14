<?php


namespace App\Validations;


use Illuminate\Support\Facades\Validator;

class FeatureApiValidation implements ValidationInterface
{
    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'feature' => 'required|max:190',
            'api' => 'required|max:190',
        ]);
    }

    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'feature' => 'required|max:190',
            'api' => 'required|max:190',
        ]);
    }
}
