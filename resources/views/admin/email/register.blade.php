@extends('admin.master_auth')
@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <form class="login-form">
                    <span class="login-form-title">
                        Chào mừng
                    </span>
                    <div class="form-noti">
                        <span>vanhau140800@gmail.com </span> đến với cộng đồng <span>devsne</span>
                    </div>
                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <a class="login-form-btn"
                                href="{{ route('change_password', ['user_id' => $user_id, 'token' => $token]) }}">
                                Đổi mật khẩu
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
