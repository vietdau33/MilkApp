@extends('auth.base')

@section('form-auth')
    <h2 class="text-center text-uppercase mb-2 font-weight-bold">Đăng Ký</h2>
    <p class="text-center">Tạo tài khoản mới</p>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                name="username"
                id="username"
                placeholder="Tên đăng nhập"
                autocomplete="off"
                value="{{ old('username') }}"
            />
            @if($errors->has('username'))
                <div class="error">{{ $errors->first('username') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                name="fullname"
                id="fullname"
                placeholder="Họ tên"
                value="{{ old('fullname') }}"
            />
            @if($errors->has('fullname'))
                <div class="error">{{ $errors->first('fullname') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control number-only"
                name="phone"
                id="phone"
                placeholder="Số điện thoại"
                value="{{ old('phone') }}"
            />
            @if($errors->has('phone'))
                <div class="error">{{ $errors->first('phone') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                name="email"
                id="email"
                placeholder="Địa chỉ email"
                value="{{ old('email') }}"
            />
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
            @if($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu">
            @if($errors->has('password_confirmation'))
                <div class="error">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-warning color-white font-weight-bold">Đăng ký</button>
        </div>
        <div class="form-group text-right">
            Bạn đã có tài khoản? <a href="{{ route('auth.login') }}">Đăng nhập</a>
        </div>
    </form>
@endsection
