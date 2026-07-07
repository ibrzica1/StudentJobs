<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Job extends Model
{
    use HasFactory;
    
    protected $table = 'jobs';

    protected $fillable = [
        'type','title','employer_id','location_id','company_id','address','setting_type',
        'weekly_hours','employee_amount','wage','start_date','from','to','duration',
        'urgent','description','tasks','expectation','offer'
    ];

    const JOB = "job";
    const HELPER_JOB = "helper-job";
    const CONSTRUCTION_HELPER = "Construction";
    const MOVING_HELPER = "Moving";
    const DECLUTTER_HELPER = "Declutter";
    const EVENT_HELPER = "Event";
    const LOGISTICS_HELPER = "Logistics";
    const OFFICE_HELPER = "Office";
    const TUTOR_HELPER = "Tutor";
    const IT_HELPER = "It";
    const BABYSITTER_HELPER = "Babysitter";
    const DRIVER_HELPER = "Driver";

    const ALLOWED_HELPER_TYPES = [
        self::CONSTRUCTION_HELPER, self::MOVING_HELPER, self::DECLUTTER_HELPER,
        self::EVENT_HELPER, self::LOGISTICS_HELPER, self::OFFICE_HELPER,
        self::TUTOR_HELPER, self::IT_HELPER, self::BABYSITTER_HELPER,
        self::DRIVER_HELPER
    ];

    const ALLOWED_SETTING_TYPES = [
        "Full Time", "Part Time", "Mini Job"
    ];
    const ALLOWED_DURATION_TYPES = [
        "indefinite","1-4 weeks","1 month","2 months",
        "3-5 months","6 months","1 year","2 years","3 years"
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
