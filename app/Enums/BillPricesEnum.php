<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum BillPricesEnum: string
{
    use EnumTranslatable;

    case JOB_AD_PRICE = 23.99;
    case TAX = 24;
}
