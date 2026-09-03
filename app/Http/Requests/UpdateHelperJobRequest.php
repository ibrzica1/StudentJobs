<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AllowedCategoryTypes;

class UpdateHelperJobRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'title' => "required|string",
            'category' => [
                'nullable',
                'string',
                new AllowedCategoryTypes()
            ],
            'location_id' => [
                'required',
                'numeric',
                'exists:locations,id'
            ],
            'address' => "nullable|string",
            'employee_amount' => "required|numeric",
            'wage' => 'required|numeric',
            'start_date' => 'required|date|after_or_equal:today',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after:from',
            'description' => 'required|string',
            'tasks' => 'nullable|string',
            'expectation' => 'nullable|string'

        ];
    }
}
