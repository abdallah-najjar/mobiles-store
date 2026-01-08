<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        return Setting::getValue($key, $default);
    }
}

if (!function_exists('all_settings')) {
    function all_settings(): array
    {
        return Setting::pluck('value', 'key')->toArray();
    }
}
