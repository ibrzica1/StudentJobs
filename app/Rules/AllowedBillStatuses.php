<?php

namespace App\Rules;

use App\Enums\BillStatusesEnum;
use App\Models\Bill;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AllowedBillStatuses implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $allowedValues = array_column(BillStatusesEnum::cases(), 'value');
        if(!in_array($value,$allowedValues) && $value !== "none"){
            $fail('You have entered the wrong status');
        }
    }
}
