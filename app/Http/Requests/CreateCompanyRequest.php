<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'imageCompany' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:4096'],
            'companyName' => ['required', 'string', 'max:255'],
        ];
    }
}
