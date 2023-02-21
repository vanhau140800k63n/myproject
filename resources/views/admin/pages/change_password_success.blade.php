@extends('admin.master_auth')
@section('head')
    <title>Xác minh tài khoản</title>
@endsection
@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <div class="login-form">
                    <span class="login-form-title">
                        Đổi mật khẩu thành công
                    </span>
                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <a href="{{ route('login') }}" class="login-form-btn">
                                Đăng nhập
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
