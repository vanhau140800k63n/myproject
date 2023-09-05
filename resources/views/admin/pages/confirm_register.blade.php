@extends('admin.master_auth')
@section('head')
    <title>Hoàn Tất Đăng Ký | DEVSNE</title>
@endsection
@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <div class="login-form">
                    @if (isset($email))
                        <span class="login-form-title">
                            Chào mừng
                        </span>
                        <div class="form-noti">
                            <span>{{ $email }} </span> đến với cộng đồng <span>devsne</span> <br>
                            Vui lòng kiểm tra mail và hoàn tất đăng ký (Email có thể bị đưa vào thư mục spam)
                        </div>
                    @elseif (isset($alert))
                        <div class="form-noti">
                            <span> Mã token đã hết hạn hoặc không đúng </span>
                        </div>
                    @endif
                </div>
            </div>
            @include('admin.pages.login_banner')
        </div>
    </div>
@endsection
