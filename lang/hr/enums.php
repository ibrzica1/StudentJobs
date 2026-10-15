<?php

use App\Enums\JobCategories;

return [
    'job_categories' => [
        JobCategories::CONSTRUCTION_HELPER->value => 'Gradnja',
        JobCategories::MOVING_HELPER->value => 'Selidba',
        JobCategories::DECLUTTER_HELPER->value => 'Spremanje',
        JobCategories::EVENT_HELPER->value => 'Dogadaji',
        JobCategories::LOGISTICS_HELPER->value => 'Logistika',
        JobCategories::OFFICE_HELPER->value => 'Ured',
        JobCategories::TUTOR_HELPER->value => 'Poduka',
        JobCategories::IT_HELPER->value => 'It',
        JobCategories::BABYSITTER_HELPER->value => 'Dadilja' ,
        JobCategories::DRIVER_HELPER->value => 'Vozac',
    ],
];