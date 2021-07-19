<?php

use App\Helpers\Attributes;

if (!function_exists('attributes_get')) {
    function attributes_get($items, $excludes = []) {
        return Attributes::get($items, $excludes);
    }
}
?>
