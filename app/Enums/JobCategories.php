<?php

namespace App\Enums;

enum JobCategories: string
{
    case CONSTRUCTION_HELPER = "Construction";
    case MOVING_HELPER = "Moving";
    case DECLUTTER_HELPER = "Declutter";
    case EVENT_HELPER = "Event";
    case LOGISTICS_HELPER = "Logistics";
    case OFFICE_HELPER = "Office";
    case TUTOR_HELPER = "Tutor";
    case IT_HELPER = "It";
    case BABYSITTER_HELPER = "Babysitter";
    case DRIVER_HELPER = "Driver";

    case ALLOWED_HELPER_TYPES = [
        self::CONSTRUCTION_HELPER, self::MOVING_HELPER, self::DECLUTTER_HELPER,
        self::EVENT_HELPER, self::LOGISTICS_HELPER, self::OFFICE_HELPER,
        self::TUTOR_HELPER, self::IT_HELPER, self::BABYSITTER_HELPER,
        self::DRIVER_HELPER
    ];
}
