<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'regex:/^[A-Za-z\d]{4,}$/i', 'unique:users,username'],
            'fullname' => 'required',
            'phone' => ['required', 'regex:/^\d{8,11}$/i', 'unique:user_info,phone'],
            'email' => 'required|email:rfc|unique:users,email',
            'password' => 'required|confirmed|string|min:5',
            'password_confirmation' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Bạn chưa nhập tên đăng nhập',
            'username.regex' => 'Tên đăng nhập chỉ chứa ký tự thường, ký tự in hoa, số và từ 4 ký tự trở lên',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'fullname.required' => 'Họ và tên không được trống',
            'phone.required' => 'Số điện thoại đang trống',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'email.required' => 'Hãy nhập địa chỉ email',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.unique' => 'Địa chỉ email đã được sử dụng',
            'password.required' => 'Hãy nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
            'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
            'password_confirmation.required' => 'Hãy nhập lại mật khẩu để xác nhận'
        ];
    }
}
