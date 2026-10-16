<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum ApplicationAcceptStatusesEnum: string
{
    use EnumTranslatable;

    case APPROVED = "approved";
    case PENDING = "pending";
    case REJECTED = "rejected";
}
