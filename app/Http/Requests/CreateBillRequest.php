<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateBillRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'numeric',
                'exists:users,id'
            ],
            'job_id' => [
                'required',
                'numeric',
                'exists:jobs,id'
            ],
            'amount' => "required|numeric",
            'status' => "required|string"
        ];
    }
}
