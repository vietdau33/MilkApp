@extends('auth.base')

@section('form-auth')
    <h2 class="text-center text-uppercase mb-2 font-weight-bold">Đăng Ký</h2>
    <p class="text-center">Tạo tài khoản mới</p>
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Họ tên">
        </div>
        <div class="form-group">
            <input type="text" class="form-control number-only" name="phone" id="phone" placeholder="Số điện thoại">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" id="email" placeholder="Địa chỉ email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-warning color-white font-weight-bold">Đăng ký</button>
        </div>
        <div class="form-group text-right">
            Bạn đã có tài khoản? <a href="{{ route('auth.login') }}">Đăng nhập</a>
        </div>
    </form>
@endsection
