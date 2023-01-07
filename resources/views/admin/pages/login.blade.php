<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/login/material-design-iconic-font.min.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/login/util.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/login/main.css')) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <style>
        .container-login {
            background-image: url('img/bg-login.jpeg');
        }
    </style>
</head>

<body>
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <form class="login-form">
                    <span class="login-form-title">
                        Login
                    </span>

                    <div class="wrap-input">
                        <span class="label-input">Email / Số điện thoại</span>
                        <input class="input" type="text" name="username" placeholder="Nhập emai hoặc số điện thoại">
                    </div>

                    <div class="wrap-input">
                        <span class="label-input">Mật khẩu</span>
                        <input class="input" type="password" name="pass" placeholder="Nhập mật khẩu">
                    </div>

                    <div class="text-right">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <button class="login-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center">
                        <span>
                            Or Sign Up Using
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            Or Sign Up Using
                        </span>

                        <a href="#" class="txt2">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
</body>

</html>
