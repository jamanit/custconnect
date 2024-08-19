<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\User;

trait UserActivityLog
{
    public static function bootUserActivityLog()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
            $model->created_log = self::generateLog();
            $model->updated_log = self::generateLog();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
            $model->updated_log = self::generateLog();
        });
    }

    protected static function generateLog()
    {
        return json_encode([
            'ip' => Request::ip(),
            'browser' => Request::header('User-Agent'),
            'device' => Request::header('Device'),
        ]);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
