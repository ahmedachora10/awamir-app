<?php

use App\Models\Setting;

if (!function_exists('settings')) {


    function settings(string $name)
    {
        return (new class {
            private static $_instance = null;

            public function checker(string $name)
            {
                $setting = collect(self::getInstance())->where('name', $name)->first();
                return $setting ? $setting->content : null;
            }

            private static function getInstance()
            {
                if(self::$_instance === null) {
                    self::$_instance = Setting::all();
                }

                return self::$_instance;
            }

        })->checker($name);
    }

}
