<?php

namespace App\Rules;

use App\Models\Job;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AllowedDurationTypes implements ValidationRule
{
    
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array($value,Job::ALLOWED_DURATION_TYPES)){
            $fail('You have entered the wrong duration type');
        }
    }
}
