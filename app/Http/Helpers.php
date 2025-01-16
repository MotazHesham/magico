<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

    if (!function_exists('customAsset')) {
        function customAsset($asset)
        {
            return $asset;
        }
    }  

    if (!function_exists('settingAsset')) {
        function settingAsset($asset)
        {
            return ltrim(asset($asset),'/');
        }
    }  

    if (!function_exists('get_setting')) {
        function get_setting($key, $default = null)
        {
            $settings = Cache::Store('file')->remember('business_settings', 86400, function () {
                return Setting::all();
            });
    
            $setting = $settings->where('key', $key)->first();
    
            return $setting == null ? $default : $setting->value;
        }
    }