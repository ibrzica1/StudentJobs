<?php

use App\Enums\JobCategories;
use App\Enums\JobDurationTypesEnum;
use App\Enums\JobSettingTypesEnum;

return [
    'job_categories' => [
        JobCategories::CONSTRUCTION_HELPER->value => JobCategories::CONSTRUCTION_HELPER->value,
        JobCategories::MOVING_HELPER->value => JobCategories::MOVING_HELPER->value,
        JobCategories::DECLUTTER_HELPER->value => JobCategories::DECLUTTER_HELPER->value,
        JobCategories::EVENT_HELPER->value => JobCategories::EVENT_HELPER->value,
        JobCategories::LOGISTICS_HELPER->value => JobCategories::LOGISTICS_HELPER->value,
        JobCategories::OFFICE_HELPER->value => JobCategories::OFFICE_HELPER->value,
        JobCategories::TUTOR_HELPER->value => JobCategories::TUTOR_HELPER->value,
        JobCategories::IT_HELPER->value => JobCategories::IT_HELPER->value,
        JobCategories::BABYSITTER_HELPER->value => JobCategories::BABYSITTER_HELPER->value ,
        JobCategories::DRIVER_HELPER->value => JobCategories::DRIVER_HELPER->value,
    ],
    'duration_types' => [
        JobDurationTypesEnum::INDEFINITE->value => JobDurationTypesEnum::INDEFINITE->value,
        JobDurationTypesEnum::WEEKS->value => JobDurationTypesEnum::WEEKS->value,
        JobDurationTypesEnum::MONTH1->value => JobDurationTypesEnum::MONTH1->value,
        JobDurationTypesEnum::MONTH2->value => JobDurationTypesEnum::MONTH2->value,
        JobDurationTypesEnum::MONTH3->value => JobDurationTypesEnum::MONTH3->value,
        JobDurationTypesEnum::MONTH6->value => JobDurationTypesEnum::MONTH6->value,
        JobDurationTypesEnum::YEAR1->value => JobDurationTypesEnum::YEAR1->value,
        JobDurationTypesEnum::YEAR2->value => JobDurationTypesEnum::YEAR2->value,
        JobDurationTypesEnum::YEAR3->value => JobDurationTypesEnum::YEAR3->value,
    ],
    'setting_types' => [
        JobSettingTypesEnum::FULL_TIME->value => JobSettingTypesEnum::FULL_TIME->value,
        JobSettingTypesEnum::PART_TIME->value => JobSettingTypesEnum::PART_TIME->value,
        JobSettingTypesEnum::MINI_JOB->value => JobSettingTypesEnum::MINI_JOB->value,
    ],
    'expectations' => [
        JobCategories::CONSTRUCTION_HELPER->value => "
    * Previous construction experience,
    * Physical fitness,
    * Reliability and punctuality,
    * Safety awareness,
    * Teamwork skills,
    * Safety shoes and work clothes,
    * Driving licence,
    * Ability to lift heavy objects",

        JobCategories::MOVING_HELPER->value => "
    * Physically fit,
    * Able to lift heavy objects,
    * Reliable and punctual,
    * Team player,
    * Customer-friendly,
    * Flexible working hours,
    * Driving licence is an advantage,
    * Positive attitude",

        JobCategories::DECLUTTER_HELPER->value => "
    * Physically fit,
    * Reliable and punctual,
    * Organized and detail-oriented,
    * Team player,
    * Respectful of clients' belongings,
    * Basic English or German,
    * Positive attitude,
    * Previous experience is a plus",

        JobCategories::EVENT_HELPER->value => "
    * Reliable and punctual,
    * Physically fit,
    * Team player,
    * Good communication skills,
    * Customer-friendly attitude,
    * Willingness to work flexible hours,
    * Ability to follow instructions,
    * Positive attitude",

        JobCategories::LOGISTICS_HELPER->value => "
    * Reliable and punctual,
    * Physically fit,
    * Team player,
    * Willingness to work flexible hours,
    * Ability to follow instructions,
    * Safety awareness,
    * Forklift driving licence,
    * Good organizational skills",

        JobCategories::OFFICE_HELPER->value => "
    * Reliable and punctual,
    * Proficiency in basic office software (Word, Excel, Email),
    * Good organizational and administrative skills,
    * Professional communication skills,
    * Attention to detail,
    * Ability to handle confidential information,
    * Proactive and efficient in multi-tasking,
    * Positive attitude",

        JobCategories::TUTOR_HELPER->value => "
    * Strong knowledge of the subject matter,
    * Patience and empathetic approach,
    * Excellent communication and teaching skills,
    * Reliable and punctual,
    * Ability to adapt teaching style to individual needs,
    * Encouraging and motivating personality,
    * Previous teaching or tutoring experience is a plus,
    * Reliable internet connection (if remote)",

        JobCategories::IT_HELPER->value => "
    * Solid understanding of hardware/software troubleshooting,
    * Problem-solving mindset,
    * Ability to explain technical concepts simply,
    * Reliable and punctual,
    * Continuous learner (keeping up with tech trends),
    * Attention to detail and security awareness,
    * Customer-friendly attitude,
    * Relevant certifications or technical education is a plus",

        JobCategories::BABYSITTER_HELPER->value => "
    * Proven experience with childcare,
    * Patience, responsibility, and reliability,
    * Safety-conscious and attentive,
    * Ability to engage children in educational/fun activities,
    * Clean criminal record (background check),
    * Clear and kind communication with parents,
    * Basic First Aid knowledge is a plus,
    * Positive and nurturing personality",

        JobCategories::DRIVER_HELPER->value => "
    * Valid driving licence (clean driving record),
    * Excellent knowledge of local traffic rules and routes,
    * Reliable and punctual,
    * Safety-oriented driving habits,
    * Ability to handle vehicle maintenance checks,
    * Customer-friendly and professional,
    * Ability to stay calm in stressful traffic conditions,
    * Flexible working hours",
    ],
    'tasks' => [
        JobCategories::CONSTRUCTION_HELPER->value => "
    * Assist with site preparation and cleanup,
    * Load and unload construction materials,
    * Operate basic hand and power tools,
    * Support skilled workers on-site,
    * Follow health and safety regulations,
    * Move and organize building materials,
    * Keep the work area clean and organized,
    * Perform general labor duties",

        JobCategories::MOVING_HELPER->value => "
    * Load and unload furniture and boxes,
    * Carry heavy items safely,
    * Pack and wrap belongings,
    * Assemble and disassemble furniture,
    * Organize items inside the moving truck,
    * Protect fragile items during transport,
    * Assist customers during moves,
    * Keep the work area clean",

        JobCategories::DECLUTTER_HELPER->value => "
    * Sort household items,
    * Organize rooms and storage areas,
    * Pack unwanted belongings,
    * Remove recyclable materials,
    * Dispose of waste responsibly,
    * Clean and prepare spaces,
    * Assist clients with organization,
    * Carry boxes and furniture",

        JobCategories::EVENT_HELPER->value => "
    * Set up tables, chairs, and equipment,
    * Assist with event decorations,
    * Welcome guests,
    * Support event coordinators,
    * Keep the venue clean,
    * Help with registration,
    * Dismantle equipment after the event,
    * Load and unload event materials",

        JobCategories::LOGISTICS_HELPER->value => "
    * Pick and pack orders,
    * Load and unload trucks,
    * Organize warehouse inventory,
    * Label packages,
    * Prepare shipments,
    * Operate warehouse equipment,
    * Maintain a clean warehouse,
    * Follow inventory procedures",

        JobCategories::OFFICE_HELPER->value => "
    * Answer phone calls and emails,
    * Schedule appointments,
    * Organize documents,
    * Maintain office records,
    * Prepare reports,
    * Enter data into systems,
    * Support daily administrative tasks,
    * Welcome visitors",

        JobCategories::TUTOR_HELPER->value => "
    * Prepare lesson plans,
    * Teach students individually,
    * Explain difficult concepts,
    * Review homework,
    * Monitor student progress,
    * Create learning materials,
    * Motivate students,
    * Provide constructive feedback",

        JobCategories::IT_HELPER->value => "
    * Install and configure software,
    * Troubleshoot technical issues,
    * Maintain computer systems,
    * Support end users,
    * Perform system updates,
    * Monitor network performance,
    * Document technical problems,
    * Ensure data security",

        JobCategories::BABYSITTER_HELPER->value => "
    * Supervise children,
    * Prepare meals and snacks,
    * Organize educational activities,
    * Assist with homework,
    * Maintain a safe environment,
    * Help with bedtime routines,
    * Change diapers if needed,
    * Communicate with parents",

        JobCategories::DRIVER_HELPER->value => "
    * Transport passengers or goods,
    * Plan efficient routes,
    * Perform vehicle inspections,
    * Keep the vehicle clean,
    * Follow traffic regulations,
    * Load and unload cargo,
    * Complete delivery documentation,
    * Provide excellent customer service",
    ]
];