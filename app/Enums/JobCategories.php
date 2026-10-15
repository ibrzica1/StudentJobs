<?php

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum JobCategories: string
{
    use EnumTranslatable;

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

}
