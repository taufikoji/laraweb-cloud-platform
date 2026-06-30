<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class ActivityLogger
{
    public function log(string $action, ?string $description = null, ?Model $subject = null, array $metadata = []): ActivityLog
    {
        return ActivityLog::query()->create([
            'subject_type' => $subject?->getMorphClass(),
            'subject_id' => $subject?->getKey(),
            'action' => $action,
            'description' => $description,
            'ip_address' => request()?->ip(),
            'user_agent' => request()?->userAgent(),
            'metadata' => $metadata ?: null,
        ]);
    }
}
