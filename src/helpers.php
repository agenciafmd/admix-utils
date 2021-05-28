<?php

use Illuminate\Support\Str;

if (! function_exists('isFullname')) {
    function isFullname(string $value)
    {
        return Str::isFullname($value);
    }
}
