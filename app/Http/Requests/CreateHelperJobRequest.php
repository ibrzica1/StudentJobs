<?php

namespace App\Http\Requests;

use App\Models\Location;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateHelperJobRequest extends FormRequest
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
