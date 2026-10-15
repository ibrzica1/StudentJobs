<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum JobSettingTypesEnum: string
{
    use EnumTranslatable;

    case FULL_TIME = "Full time";
    case PART_TIME = "Part time";
    case MINI_JOB = "Mini Job";
}
