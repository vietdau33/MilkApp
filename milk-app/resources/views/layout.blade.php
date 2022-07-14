<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Milk Store</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    @include('meta_seo')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alertifyjs/css/alertify.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('alertifyjs/css/themes/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('fontawesome/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css?i=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('css/app.css?i=' . time()) }}">
</head>
<body>

@include('bg_particle')

<header class="pt-3 pb-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-2 text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-logo">
            </div>
            <div class="col-7">
                <h3 class="text-uppercase font-weight-bold mb-0" style="color: #0070c0">An Khang Group</h3>
                <h3 class="text-uppercase font-weight-bold mb-0" style="color: #ff9900">Nơi tạo niềm tin bền vững</h3>
            </div>
            <div class="col-3">
                @if(logined())
                    <div class="box-info">
                        <p class="m-0">Xin chào, khách hàng: <b>{{ user()->info->fullname }}</b></p>
                        <p class="m-0">Số điểm: <b>{{ user()->info->point }}</b></p>
                    </div>
                @else
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{ route('auth.login') }}">Đăng Nhập</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('alertifyjs/alertify.min.js') }}"></script>
<script src="{{ asset('js/request.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('js/app.js?i=' . time()) }}"></script>
@include('show_mgs_notif')
@yield('script')
</body>
</html>
