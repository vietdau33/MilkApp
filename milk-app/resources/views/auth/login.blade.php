@extends('auth.base')

@section('form-auth')
    <h2 class="text-center text-uppercase mb-3 font-weight-bold">Đăng Nhập</h2>
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
        </div>
        <div class="form-group text-right">
            <a href="#">Quên mật khẩu?</a>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-warning color-white font-weight-bold">Đăng nhập</button>
        </div>
    </form>
@endsection
