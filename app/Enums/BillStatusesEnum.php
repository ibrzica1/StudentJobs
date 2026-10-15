<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum BillStatusesEnum: string
{
    use EnumTranslatable;

    case PAYED = "payed";
    case UNPAYED = "unpayed";
}
