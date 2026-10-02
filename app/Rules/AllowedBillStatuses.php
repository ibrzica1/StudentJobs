<?php

namespace App\Rules;

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
        if(!in_array($value,Bill::ALLOWED_STATUSES) && $value !== "none"){
            $fail('You have entered the wrong status');
        }
    }
}
