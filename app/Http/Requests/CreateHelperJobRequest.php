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
                new Location()
            ],
            'address' => "string",
            'employee_amount' => "required|numeric",
            'wage' => 'required|numeric'
        ];
    }
}
