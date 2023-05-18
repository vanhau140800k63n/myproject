<div style="box-sizing: border-box; padding: 50px 30px;">
    <div
        style="display: flex; flex-direction: column; box-sizing: border-box; padding: 50px 30px; justify-content: center; align-items: center;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius: 10px; 
        background-image: url(https://res.cloudinary.com/practicaldev/image/fetch/s--LEsb8Hva--/c_imagga_scale,f_auto,fl_progressive,h_420,q_auto,w_1000/https://dev-to-uploads.s3.amazonaws.com/i/arasur0jjdbqabgl69xr.png); 
        background-size: cover;">
        <div
            style="color: #ff974d; font-family: Google Sans,'Roboto',Arial;font-size: 38px;font-weight: bold;line-height: 44px;">
            Xin chào!
        </div>
        <div
            style="color: #fff; font-family: Google Sans,'Roboto',Arial;font-size: 22px;font-weight: normal;line-height: 44px;">
            {{ $email }}
        </div>
        <div
            style="color: #fff; font-family: Google Sans,'Roboto',Arial;font-size: 18px;font-weight: normal;line-height: 44px;">
            đến với cộng đồng devsne. Để hoàn tất đăng ký, vui lòng nhấn vào link bên dưới:</div>
        <div style="margin-top: 20px; height: 100px; text-align: center;">
            <a href="{{ route('change_password', ['user_id' => $user_id, 'token' => $token]) }}"
                style="text-decoration: none; background: linear-gradient(83.2deg, rgba(150, 93, 233, 1) 10.8%, rgba(99, 88, 238, 1) 94.3%);
            color: #fff; font-family: Google Sans,'Roboto',Arial;font-size: 22px;font-weight: normal;line-height: 44px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;">
                Đổi mật khẩu
            </a>
        </div>
    </div>
</div>
