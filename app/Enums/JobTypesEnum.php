<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum JobTypesEnum: string
{
    use EnumTranslatable;

    case JOB = "job";
    case HELPER_JOB = "helper-job";
}
