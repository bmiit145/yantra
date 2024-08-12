<?php

namespace App\Services;

use App\Models\ChangeLog;
use App\Models\ContactAddress;
use Illuminate\Support\Facades\Log;


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

    public static function logChanges($fields , $original, $current , $model)
    {

        $dataChanges = array_filter(array_combine($fields , (array_map(function($field) use ($original, $current) {
            $originalValue = $original[$field] ?? 'None';
            $currentValue = $current[$field] ?? 'None';

            return $originalValue !== $currentValue ? [
                'old' => $originalValue,
                'new' => $currentValue
            ] : null;
        }, $fields))));

        $changes = $dataChanges;

        // Log changes if any
        if (!empty($changes)) {
            $message = json_encode($changes, JSON_PRETTY_PRINT);
            self::log($model, 'updated', $message);
            Log::info('Detected changes:', ['changes' => $changes]);
        }
    }

}
