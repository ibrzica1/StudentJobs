<?php

namespace App\Rules;

use App\Models\Job;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AllowedSettingTypes implements ValidationRule
{
    
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array($value,Job::ALLOWED_SETTING_TYPES)){
            $fail('You have entered wrong setting type');
        }
    }
}
