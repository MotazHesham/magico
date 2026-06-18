<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

    if (!function_exists('currentEditingLang')) {
        function currentEditingLang()
        {
            return request('lang',app()->getLocale());
        }
    }  

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
        function get_setting($key, $default = null, $lang = false)
        {
            if (tenancy()->initialized) {
                $settings = Cache::Store('file')->remember('business_settings_'.tenant('id'), 86400, function () {
                    return Setting::all();
                });
            }else{
                $settings = Cache::Store('file')->remember('business_settings', 86400, function () {
                    return Setting::all();
                });
            }  

            if ($lang == false) { 
                $setting = $settings->where('key', $key)->first();
            } else {
                $setting = $settings->where('key', $key)->where('lang', $lang)->first();
                $setting = !$setting ? $settings->where('key', $key)->first() : $setting;
            } 
    
            return $setting == null ? $default : $setting->value;
        }
    }

    if (!function_exists('section_visible')) {
        function section_visible($section, $default = true)
        {
            $value = get_setting("section_{$section}_visible");

            if ($value === null) {
                return $default;
            }

            return $value === '1' || $value === 1 || $value === true;
        }
    }

    if (!function_exists('section_title')) {
        function section_title($section, $part, $default = '')
        {
            $value = get_setting("section_{$section}_title_{$part}", null, app()->getLocale());

            return ($value !== null && $value !== '') ? $value : $default;
        }
    }