<?php


namespace App\Validations;


use Illuminate\Support\Facades\Validator;

class FeatureApiValidation implements ValidationInterface
{
    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'feature' => 'required|max:190',
            'api' => 'required|max:190',
        ]);
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'feature' => 'required|max:190',
            'api' => 'required|max:190',
        ]);
    }
}
