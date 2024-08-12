<?php

namespace App\Services;

use App\Models\ChangeLog;


class LogService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public static function log($model, $action, $message, $user_id = null, $attachments = null, $is_system = true)
    {
        ChangeLog::create([
            'loggable_id' => $model->id,
            'loggable_type' => get_class($model),
            'action' => $action,
            'message' => $message,
            'user_id' => $user_id ?? auth()->id(),
            'attachments' => $attachments ?? null,
            'is_system' => $is_system ?? true,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent')
        ]);
    }

}
