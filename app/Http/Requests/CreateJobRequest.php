<?php

namespace App\Http\Requests;

use App\Rules\AllowedDurationTypes;
use App\Rules\AllowedSettingTypes;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => "required|string",
            'location_id' => [
                'required',
                'numeric',
                'exists:locations,id'
            ],
            'company_id' => [
                'nullable',
                'numeric',
                'exists:companies,id'
            ],
            'wage' => 'required|numeric',
            'setting_type' => [
                'required',
                'string',
                new AllowedSettingTypes()
            ],
            'weekly_hours' => "required|numeric",
            'start_date' => 'required|date|after_or_equal:today',
            'duration' => [
                'required',
                'string',
                new AllowedDurationTypes()
            ],
            'description' => 'required|string',
            'expectation' => 'nullable|string',
            'offer' => 'nullable|string',
        ];
    }
}
