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
        'type','category','title','employer_id','location_id','company_id','address','setting_type',
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
    const INDEFINITE = 'indefinite';
    const WEEKS = '1-4 weeks';
    const MONTH1 = "1 month";
    const MONTH2 = "2 months";
    const MONTH3 = "3-5 months";
    const MONTH6 = "6 months";
    const YEAR1 = "1 year";
    const YEAR2 = "2 years";
    const YEAR3 = "3 years";
    const FULL_TIME = "Full time";
    const PART_TIME = "Part time";
    const MINI_JOB = "Mini Job";

    const ALLOWED_JOB_TYPES = [
         self::HELPER_JOB, self::JOB,
    ];

    const ALLOWED_HELPER_TYPES = [
        self::CONSTRUCTION_HELPER, self::MOVING_HELPER, self::DECLUTTER_HELPER,
        self::EVENT_HELPER, self::LOGISTICS_HELPER, self::OFFICE_HELPER,
        self::TUTOR_HELPER, self::IT_HELPER, self::BABYSITTER_HELPER,
        self::DRIVER_HELPER
    ];

    const ALLOWED_SETTING_TYPES = [
       self::FULL_TIME, self::PART_TIME, self::MINI_JOB,
    ];
    const ALLOWED_DURATION_TYPES = [
        self::INDEFINITE, self::WEEKS, self::MONTH1,
        self::MONTH2, self::MONTH3, self::MONTH6,
        self::YEAR1, self::YEAR2, self::YEAR3,
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
