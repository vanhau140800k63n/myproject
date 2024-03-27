@extends('admin.master_auth')
@section('head')
    <title>Đăng Ký | DEVSNE</title>
@endsection

@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <form class="login-form" method="POST" action="{{ route('post_register') }}">
                    @csrf
                    <span class="login-form-title">
                        ĐĂNG KÝ
                    </span>

                    <div class="wrap-input">
                        <span class="label-input">Email</span>
                        <input class="input" type="email" name="email" placeholder="Nhập email">
                        <span class="focus-input" data-symbol="∙"></span>
                    </div>

                    <div class="wrap-input">
                        <span class="label-input">Số điện thoại</span>
                        <input class="input" type="number" name="phone" placeholder="Nhập số điện thoại" min="0">
                        <span class="focus-input" data-symbol="∙"></span>
                    </div>

                    @if (count($errors) > 0)
                        <div class="error-text">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
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
                                Đăng ký
                            </button>
                        </div>
                    </div>

                    <a href="{{ url('auth/google') }}" class="google-btn">
                        <div class="google-btn-box">
                            <img class="google-icon"
                                src="https://cdn-icons-png.flaticon.com/128/300/300221.png" />
                            <p class="google-btn-text">Đăng nhập với Google</p>
                        </div>
                    </a>

                    <div class="flex-col-c">
                        <span class="txt1">
                            Nếu bạn đã có tài khoản
                        </span>

                        <a href="{{ route('login') }}" class="txt2">
                            Đăng nhập
                        </a>
                    </div>
                </form>
            </div>
            @include('admin.pages.login_banner')
        </div>
    </div>
@endsection
