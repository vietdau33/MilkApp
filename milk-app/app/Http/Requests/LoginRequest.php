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
            'password' => 'required|string|min:5'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Hãy nhập tên đăng nhập',
            'password.required' => 'Hãy nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất là 5 ký tự',
        ];
    }
}
