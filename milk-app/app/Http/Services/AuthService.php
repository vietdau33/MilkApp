<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserInfo;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public static function login($request): bool
    {
        $credentials = $request->only(['username', 'password']);
        return Auth::attempt($credentials);
    }

    public static function register($request): bool
    {
        DB::beginTransaction();
        try {
            $password = Hash::make($request->password);
            $user = ModelService::insert(User::class, [
                'email' => $request->email,
                'username' => $request->username,
                'password' => $password,
                'is_active' => 0,
                'role' => 'nomal'
            ]);
            if ($user === false) {
                DB::rollBack();
                session()->flash('mgs_error', 'Tạo tài khoản mới không thành công');
                return false;
            }
            $userInfo = ModelService::insert(UserInfo::class, [
                'user_id' => $user->id,
                'fullname' => $request->fullname,
                'phone' => $request->phone
            ]);
            if ($userInfo === false) {
                DB::rollBack();
                session()->flash('mgs_error', 'Tạo tài khoản mới không thành công!');
                return false;
            }
            session()->flash('mgs_success', 'Tạo tài khoản thành công. Vui lòng đăng nhập lại!');
            DB::commit();
            return true;
        } catch (Exception $exception) {
            logger($exception->getMessage());
            DB::rollBack();
            session()->flash('mgs_error', 'Đã có lỗi nghiêm trọng! Hãy báo cáo với Admin để được xử lý!');
            return false;
        }
    }

    public static function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
