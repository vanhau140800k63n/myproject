<div>
    <div
        style="color: #2c2a29; font-family: Google Sans,'Roboto',Arial;font-size: 18px;font-weight: bold;line-height: 44px; text-decoration: none;">
        Chào mừng {{ $email }}, đến với cộng đồng devsne. Để hoàn tất đăng ký, vui lòng nhấn vào link bên dưới:
    </div>

    <div style="margin-top: 20px; height: 100px; text-align: center;">
        <a href="{{ route('change_password', ['user_id' => $user_id, 'token' => $token]) }}"
            style="text-decoration: none; background: linear-gradient(83.2deg, rgba(150, 93, 233, 1) 10.8%, rgba(99, 88, 238, 1) 94.3%);
        color: #fff; font-family: Google Sans,'Roboto',Arial;font-weight: bold;line-height: 44px;
        padding: 10px 20px; font-size: 22px;
        border: none;
        border-radius: 5px;">
            Đặt mật khẩu
        </a>
    </div>
</div>
