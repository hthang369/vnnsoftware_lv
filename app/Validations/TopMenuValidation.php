<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

class TopMenuValidation implements ValidationInterface
{
    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function newValidate($request)
    {
        return $validator = Validator::make($request, [
            'name' => "required|max:190|unique:top_menu,name,NULL,id,deleted_at,NULL",
            'lang' => 'required|max:190',
            'index' => 'nullable|numeric|max:190',
            'url' => 'nullable|max:190',
        ]);
    }

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function updateValidate($request, $id = null)
    {
        return $validator = Validator::make($request, [
            'name' => "required|max:190|unique:top_menu,name,$id,id,deleted_at,NULL",
            'lang' => 'required|max:190',
            'index' => 'nullable|numeric|max:190',
            'url' => 'nullable|max:190',
        ]);
    }
}
