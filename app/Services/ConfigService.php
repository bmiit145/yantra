<?php

namespace App\Services;

use App\Models\Setting;

class ConfigService
{
    /**
     * Get a setting value from the database, .env, or default value.
     *
     * @param string $key The setting key.
     * @param mixed $default Default value if the setting is not found.
     * @return mixed The setting value.
     */
    public static function get($key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();

        if ($setting) {
            return (int) $setting->value;
        }

        return (int) env($key, $default);
    }
}
