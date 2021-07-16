<?php

namespace App\Support;

use Illuminate\Support\Facades\Request;

class CommonHelper
{
    public static function getSectionCode()
    {
        if (\is_null(Request::route())) return '';
        $routeName = explode('.', Request::route()->getName());
        return trim(head($routeName));
    }
}
