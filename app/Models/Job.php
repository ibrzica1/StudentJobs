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
    const CONSTRUCTION_HELPER = "Construction Helper";
    const MOVING_HELPER = "Moving Helper";
    const DECLUTTER_HELPER = "Declutter Helper";
    const EVENT_HELPER = "Event Helper";
    const LOGISTIK_HELPER = "Logistik Helper";
    const OFFICE_HELPER = "Office Helper";
    const TUTOR_HELPER = "Tutor Helper";
    const IT_HELPER = "It Helper";
    const BABYSITTER_HELPER = "Babysitter Helper";
    const DRIVER_HELPER = "Driver Helper";
    const OTHER = "Other";

    const ALLOWED_HELPER_TYPES = [
        self::CONSTRUCTION_HELPER, self::MOVING_HELPER, self::DECLUTTER_HELPER,
        self::EVENT_HELPER, self::LOGISTIK_HELPER, self::OFFICE_HELPER,
        self::TUTOR_HELPER, self::IT_HELPER, self::BABYSITTER_HELPER,
        self::DRIVER_HELPER, self::OTHER
    ];

    const ALLOWED_SETTING_TYPES = [
        "Full Time", "Part Time", "Mini Job"
    ];
    const ALLOWED_DURATION_TYPES = [
        "indefinite","1-4 weeks","1 month","2 months",
        "3-5 months","6 months","1 year","2 years","3 years"
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
