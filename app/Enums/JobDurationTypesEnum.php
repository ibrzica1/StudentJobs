<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum JobDurationTypesEnum: string
{
    use EnumTranslatable;

    case INDEFINITE = 'indefinite';
    case WEEKS = '1-4 weeks';
    case MONTH1 = "1 month";
    case MONTH2 = "2 months";
    case MONTH3 = "3-5 months";
    case MONTH6 = "6 months";
    case YEAR1 = "1 year";
    case YEAR2 = "2 years";
    case YEAR3 = "3 years";
}
