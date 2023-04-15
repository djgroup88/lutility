<?php

use Facades\Kastanaz\Lutility\Services\SettingService;

/**
 * Setting
 *
 * @param string|null $key
 * @return mixed
 */

 if (! function_exists('setting'))
 {
     function setting(?string $key = null)
     {
         if (is_null($key)) {
             return SettingService::all();
         }
         return SettingService::get($key);
     }
 }
