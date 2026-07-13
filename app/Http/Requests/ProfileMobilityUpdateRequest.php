<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileMobilityUpdateRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_licence' => ['nullable', 'boolean'],
            'car_available' => ['nullable', 'boolean'],
            'truck_licence' => ['nullable', 'boolean'],
        ];
    }
}
