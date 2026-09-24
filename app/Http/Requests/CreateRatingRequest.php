<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRatingRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'score' => 'required|numeric|min:1|max:5',
            'comment' => 'string|max:250',
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
        ];
    }
}
