<?php

use App\Enums\JobCategories;

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
];