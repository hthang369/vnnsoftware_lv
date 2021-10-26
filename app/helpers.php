<?php

use App\Helpers\Attributes;
use Illuminate\Support\Facades\Auth;

if (!function_exists('attributes_get')) {
    function attributes_get($items, $excludes = []) {
        return Attributes::get($items, $excludes);
    }
}
if (!function_exists('user_get')) {
    function user_get($key = null)
    {
        $user = null;
        if (Auth::check()) {
            $user = Auth::user();
        }
        if (!is_null($key) && !is_null($user)) {
            return object_get($user, $key);
        }
        return $user;
    }
}
if (!function_exists('user_can')) {
    function user_can($action)
    {
        return (Auth::check() && Auth::user()->can($action));
    }
}
?>
