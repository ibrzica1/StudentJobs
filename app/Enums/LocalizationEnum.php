<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum LocalizationEnum: string
{
    use EnumTranslatable;

    case ENGLISH = "en";
    case CROATIAN = "hr";
    case GERMAN = "de";
}
