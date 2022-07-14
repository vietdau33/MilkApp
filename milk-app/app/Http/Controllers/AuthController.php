<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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
        session()->flash('mgs_error', 'Username or Password not correct!');
        return redirect()->back()->withInput();
    }

    public function register(): Factory|View|Application
    {
        return view('auth.register');
    }

    public function registerPost(RegisterRequest $request): RedirectResponse
    {
        if (AuthService::register($request)) {
            return redirect()->route('auth.login');
        }
        return back()->withInput();
    }
}
