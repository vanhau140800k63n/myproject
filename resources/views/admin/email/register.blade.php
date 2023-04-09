<span style="font-size: 16px; font-weight: 500; color: #000">
    Chào mừng
</span>
<div>
    <span>{{ $email }} </span> đến với cộng đồng <span>devsne</span>
</div>
<div style="margin-top: 20px; height: 100px; text-align: center;">
    <a href="{{ route('change_password', ['user_id' => $user_id, 'token' => $token]) }}"
        style="text-decoration: none; background: linear-gradient(83.2deg, rgba(150, 93, 233, 1) 10.8%, rgba(99, 88, 238, 1) 94.3%);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;">
        Đổi mật khẩu
    </a>
</div>
