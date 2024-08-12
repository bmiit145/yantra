<?php

namespace App;
use App\Models\ChangeLog;

trait HasChangeLogs
{
    protected static function bootHasChangeLogs()
    {
        static::created(function ($model) {
            $model->logChange('created', ucfirst(class_basename($model)) . ' created');
        });

        static::updated(function ($model) {
            $model->logChange('updated', ucfirst(class_basename($model)) . ' updated');
        });

        static::deleted(function ($model) {
            $model->logChange('deleted', ucfirst(class_basename($model)) . ' deleted');
        });
    }

    public function logChange($action, $message, $user_id = null, $attachments = null, $is_system = true)
    {
        ChangeLog::create([
            'loggable_id' => $this->id,
            'loggable_type' => get_class($this),
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
