<?php

use App\Http\Controllers\AuthController;
use App\Http\Services\AuthService;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::post('auth/logout', function() {
    return AuthService::logout();
});

Route::middleware('is_guest')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
        Route::get('register', [AuthController::class, 'register'])->name('register');
        Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');
    });
});

Route::any( '{path}', function(){
    return redirect()->to(RouteServiceProvider::HOME);
});
