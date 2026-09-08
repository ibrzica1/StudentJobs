<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateApplicationRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => "required|string",
            'job_id' => [
                'required',
                'numeric',
                'exists:jobs,id'
            ],
        ];
    }
}
