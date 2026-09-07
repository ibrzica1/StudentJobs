<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'text','user_id','job_id','status'
    ];

    const PENDING = "pending";
    const APPROVED = "approved";
    const REJECTED = "rejected";

    const ALLOWED_STATUSES = [
        self::PENDING, self::APPROVED, self::REJECTED
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
