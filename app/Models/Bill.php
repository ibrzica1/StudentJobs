<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = ['user_id','job_id','amount','status'];

    const PAYED = "payed";
    const UNPAYED = "unpayed";

    const ALLOWED_STATUSES = [
        self::PAYED, self::UNPAYED
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
