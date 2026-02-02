<?php

use Illuminate\Support\Str;

if (! function_exists('active')) {
    function active(string $path): bool
    {
        return request()->is($path);
    }
}
