<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rules;

class StoreEmployerRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'location_id' => ['required','numeric','exists:locations,id'],
            'telephone' => ['required', 'string', 'max:20'],
            'imageCompany' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:4096'],
            'companyName' => ['required', 'string', 'max:255'],
            
        ];
    }
}
