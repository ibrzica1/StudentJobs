<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyInfoUpdateRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'companyName' => ['required', 'string','min:1', 'max:50'],
            'companyId' => ['required', 'integer'],
        ];
    }
}
