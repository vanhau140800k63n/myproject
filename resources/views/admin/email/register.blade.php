<span class="login-form-title">
    Chào mừng
</span>
<div class="form-noti">
    <span>{{ $email }} </span> đến với cộng đồng <span>devsne</span>
</div>
<div class="container-login-form-btn">
    <div class="wrap-login-form-btn">
        <div class="login-form-bgbtn"></div>
        <a class="login-form-btn" href="{{ route('change_password', ['user_id' => $user_id, 'token' => $token]) }}">
            Đổi mật khẩu
        </a>
    </div>
</div>
