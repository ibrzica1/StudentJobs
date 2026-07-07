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

    const ROLES = [
        'Construction' => [
            'TITLE' => 'Construction',
            'EXPECTATIONS' => [
                'Previous construction experience',
                'Physical fitness',
                'Reliability and punctuality',
                'Safety awareness',
                'Teamwork skills',
                'Safety shoes and work clothes',
                'Driving licence',
                'Ability to lift heavy objects',
            ],
        ],

        'Moving' => [
            'TITLE' => 'Moving',
            'EXPECTATIONS' => [
                'Physically fit',
                'Able to lift heavy objects',
                'Reliable and punctual',
                'Team player',
                'Customer-friendly',
                'Flexible working hours',
                'Driving licence is an advantage',
                'Positive attitude',
            ],
        ],

        'Declutter' => [
            'TITLE' => 'Declutter',
            'EXPECTATIONS' => [
                'Physically fit',
                'Reliable and punctual',
                'Organized and detail-oriented',
                'Team player',
                "Respectful of clients' belongings",
                'Basic English or German',
                'Positive attitude',
                'Previous experience is a plus',
            ],
        ],

        'Event' => [
            'TITLE' => 'Event',
            'EXPECTATIONS' => [
                'Reliable and punctual',
                'Physically fit',
                'Team player',
                'Good communication skills',
                'Customer-friendly attitude',
                'Willingness to work flexible hours',
                'Ability to follow instructions',
                'Positive attitude',
            ],
        ],

        'Logistics' => [
            'TITLE' => 'Logistics',
            'EXPECTATIONS' => [
                'Reliable and punctual',
                'Physically fit',
                'Team player',
                'Willingness to work flexible hours',
                'Ability to follow instructions',
                'Safety awareness',
                'Forklift driving licence',
                'Good organizational skills',
            ],
        ],

        'Office' => [
            'TITLE' => 'Office',
            'EXPECTATIONS' => [
                'Reliable and punctual',
                'Proficiency in basic office software (Word, Excel, Email)',
                'Good organizational and administrative skills',
                'Professional communication skills',
                'Attention to detail',
                'Ability to handle confidential information',
                'Proactive and efficient in multi-tasking',
                'Positive attitude',
            ],
        ],

        'Tutor' => [
            'TITLE' => 'Tutor',
            'EXPECTATIONS' => [
                'Strong knowledge of the subject matter',
                'Patience and empathetic approach',
                'Excellent communication and teaching skills',
                'Reliable and punctual',
                'Ability to adapt teaching style to individual needs',
                'Encouraging and motivating personality',
                'Previous teaching or tutoring experience is a plus',
                'Reliable internet connection (if remote)',
            ],
        ],

        'It' => [
            'TITLE' => 'IT',
            'EXPECTATIONS' => [
                'Solid understanding of hardware/software troubleshooting',
                'Problem-solving mindset',
                'Ability to explain technical concepts simply',
                'Reliable and punctual',
                'Continuous learner (keeping up with tech trends)',
                'Attention to detail and security awareness',
                'Customer-friendly attitude',
                'Relevant certifications or technical education is a plus',
            ],
        ],

        'Babysitter' => [
            'TITLE' => 'Babysitter',
            'EXPECTATIONS' => [
                'Proven experience with childcare',
                'Patience, responsibility, and reliability',
                'Safety-conscious and attentive',
                'Ability to engage children in educational/fun activities',
                'Clean criminal record (background check)',
                'Clear and kind communication with parents',
                'Basic First Aid knowledge is a plus',
                'Positive and nurturing personality',
            ],
        ],

        'Driver' => [
            'TITLE' => 'Driver',
            'EXPECTATIONS' => [
                'Valid driving licence (clean driving record)',
                'Excellent knowledge of local traffic rules and routes',
                'Reliable and punctual',
                'Safety-oriented driving habits',
                'Ability to handle vehicle maintenance checks',
                'Customer-friendly and professional',
                'Ability to stay calm in stressful traffic conditions',
                'Flexible working hours',
            ],
        ],
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
