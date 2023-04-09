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
        <a class="login-form-btn" href="{{ route('change_password', ['user_id' => $user_id, 'token' => $token]) }}"
            style="text-align: center; text-decoration: none; background: linear-gradient(83.2deg, rgba(150, 93, 233, 1) 10.8%, rgba(99, 88, 238, 1) 94.3%);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;">
            Đổi mật khẩu
        </a>
    </div>
</div>
