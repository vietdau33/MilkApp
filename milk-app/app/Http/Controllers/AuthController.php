<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(): Factory|View|Application
    {
        return view('auth.login');
    }

    public function loginPost(LoginRequest $request): RedirectResponse
    {
        if (AuthService::login($request)) {
            return redirect()->to(RouteServiceProvider::HOME);
        }
        return redirect()->back()->with(['mgs_error' => 'Username or Password not correct!']);
    }

    public function register(): Factory|View|Application
    {
        return view('auth.register');
    }
}
