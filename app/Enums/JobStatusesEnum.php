<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum JobStatusesEnum: string
{
    use EnumTranslatable;

    case ACTIVE = "active";
    case PROMISED = "promised";
    case FINISHED = "finished";
}
