<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum ApplicationSeenStatusesEnum: string
{
    use EnumTranslatable;

    case SEEN = "seen";
    case UNSEEN = "unseen";
}
