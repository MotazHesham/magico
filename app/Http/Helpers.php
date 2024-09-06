<?php


    if (!function_exists('customAsset')) {
        function customAsset($asset)
        {
            return 'http://' . request()->getHost() . '/public/'. $asset;
        }
    } 
