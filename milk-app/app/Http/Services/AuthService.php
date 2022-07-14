<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public static function login($request): bool
    {
        $credentials = $request->only(['username', 'password']);
        return Auth::attempt($credentials);
    }
}
