<?php

namespace App\Validations;


interface ValidationInterface {
    public function updateValidate($request, $id = NULL);
    public function newValidate($request);
}
