<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileEducationUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'university' => ['nullable', 'string', 'max:400'],
            'certificates' => ['nullable', 'string', 'max:500'],
        ];
    }
}
