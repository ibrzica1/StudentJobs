<?php

declare(strict_types=1);

namespace App\Enums;

use Osama\LaravelEnums\Concerns\EnumTranslatable;

enum BillPricesEnum: string
{
    use EnumTranslatable;

    case JOB_AD_PRICE = "23.99";
    case TAX = "24";

    public function JobAdFloatPrice():float
    {
        return (float) self::JOB_AD_PRICE->value;
    }

    public function TaxFloatPrice():float
    {
        return (float) self::TAX->value;
    }
}
