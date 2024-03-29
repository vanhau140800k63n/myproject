@extends('admin.master_auth')
@section('head')
    <title>Đăng nhập - Devsne</title>
@endsection

@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <form class="login-form" method="POST" action="{{ route('post_login') }}">
                    @csrf
                    <span class="login-form-title">
                        ĐĂNG NHẬP
                    </span>

                    <div class="wrap-input">
                        <span class="label-input">Email</span>
                        <input class="input" type="text" name="email" placeholder="Nhập emai">
                        <span class="focus-input" data-symbol="∙"></span>
                    </div>

                    <div class="wrap-input">
                        <span class="label-input">Mật khẩu</span>
                        <input class="input" type="password" name="password" placeholder="Nhập mật khẩu">
                        <span class="focus-input" data-symbol="∙"></span>
                    </div>

                    @if (count($errors) > 0)
                        <div class="error-text">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif
                    @if (session()->get('alert'))
                        <div class="error-text">
                            Thông tin đăng nhập không đúng
                        </div>
                    @endif

                    <div class="text-right">
                        <a href="{{ route('forgot_password') }}" class="fg-password">
                            Quên mật khẩu?
                        </a>
                    </div>

                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <button class="login-form-btn">
                                Đăng nhập
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center">
                        <span>
                            Đăng nhập với
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login-social-item bg1">
                            <i class="fa-brands fa-facebook"></i>
                        </a>

                        <a href="#" class="login-social-item bg3">
                            <i class="fa-brands fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c">
                        <span class="txt1">
                            Nếu bạn chưa có tài khoản
                        </span>

                        <a href="{{ route('register') }}" class="txt2">
                            Đăng ký
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
