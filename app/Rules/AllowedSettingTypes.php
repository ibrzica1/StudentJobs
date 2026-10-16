<?php

namespace App\Rules;

use App\Enums\JobSettingTypesEnum;
use App\Models\Job;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AllowedSettingTypes implements ValidationRule
{
    // Custom rule that checks if entered setting type exist
    // in allowed setting types
    
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array($value,JobSettingTypesEnum::cases())){
            $fail('You have entered the wrong setting type');
        }
    }
}
