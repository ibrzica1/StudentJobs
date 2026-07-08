<?php

namespace App\Rules;

use Closure;
use App\Models\Job;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AllowedCategoryTypes implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array($value,Job::ALLOWED_HELPER_TYPES) && $value !== "none"){
            $fail('You have entered the wrong category');
        }
    }
}
