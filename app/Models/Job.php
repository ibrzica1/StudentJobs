<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'type','title','employer_id','location_id','address','setting_type',
        'weekly_hours','employee_amount','wage','start_date','from','to','duration',
        'urgent','description','tasks','expectation','offer'
    ];

    const JOB = "job";
    const HELPER_JOB = "helper-job";
    const FULL_TIME = "Full Time";
    const PART_TIME = "Part Time";
    const MINI_JOB = "Mini Job";

    const ALLOWED_SETTING_TYPES = [
        self::FULL_TIME, self::PART_TIME, self::MINI_JOB
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
