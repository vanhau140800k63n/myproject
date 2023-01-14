@extends('admin.master_auth')
@section('head')
    <title>Đổi mật khẩu</title>
@endsection
@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <div class="login-form">
                    @if (isset($email))
                        <span class="login-form-title">
                            Xin chào
                        </span>
                        <div class="form-noti">
                            <span>{{ $email }} </span><br>
                            Vui lòng kiểm tra mail để thay đổi mật khẩu
                        </div>
                    @elseif (isset($alert))
                        <div class="form-noti">
                            <span> Mã token đã hết hạn hoặc không đúng </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
