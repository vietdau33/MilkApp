<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required',
            'password' => 'required|regex:/^.{6,30}$/i'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username has required',
            'password.required' => 'Password has required',
            'password.regex' => 'Password must be between 6 and 30 characters',
        ];
    }
}
