@extends('admin.master_auth')
@section('head')
    <title>Đăng ký | DEVSNE</title>
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

                    {{-- <div class="txt1 text-center">
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
                    </div> --}}

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
        </div>
    </div>
@endsection
