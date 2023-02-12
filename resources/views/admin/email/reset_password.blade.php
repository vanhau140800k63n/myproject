@extends('admin.master_auth')
@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <form class="login-form">
                    <span class="login-form-title">
                        Xác minh email
                    </span>
                    <div class="form-noti">
                        Xin chào <span>{{ $email }}, </span>
                        Vui lòng lựa chọn nút bên dưới để xác minh địa chỉ email Tài Khoản của bạn.
                        Việc xác minh địa chỉ email sẽ đảm bảo thêm một lớp bảo mật cho tài khoản của bạn.
                        Cung cấp thông tin chính xác sẽ giúp bạn nhận được hỗ trợ về tài khoản dễ dàng hơn khi cần.
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
