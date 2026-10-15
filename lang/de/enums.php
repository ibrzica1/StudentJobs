<?php

use App\Enums\JobCategories;

return [
    'job_categories' => [
        JobCategories::CONSTRUCTION_HELPER->value => 'Bau',
        JobCategories::MOVING_HELPER->value => 'Umzug',
        JobCategories::DECLUTTER_HELPER->value => 'Entrümpelung',
        JobCategories::EVENT_HELPER->value => 'Veranstaltung',
        JobCategories::LOGISTICS_HELPER->value => 'Logistik',
        JobCategories::OFFICE_HELPER->value => 'Büro',
        JobCategories::TUTOR_HELPER->value => 'Nachhilfe',
        JobCategories::IT_HELPER->value => 'IT',
        JobCategories::BABYSITTER_HELPER->value => 'Babysitter' ,
        JobCategories::DRIVER_HELPER->value => 'Fahrer',
    ],
];