<?php

namespace App\Rules;

use App\Enums\JobCategories;
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
        if(!in_array($value,JobCategories::cases()) && $value !== "none"){
            $fail('You have entered the wrong category');
        }
    }
}
