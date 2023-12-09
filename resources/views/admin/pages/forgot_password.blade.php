@extends('admin.master_auth')
@section('head')
    <title>Quên mật khẩu | DEVSNE</title>
@endsection

@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <form class="login-form" method="POST" action="{{ route('post_forgot_password') }}">
                    @csrf
                    <span class="login-form-title">
                        Quên mật khẩu
                    </span>

                    <div class="wrap-input">
                        <span class="label-input">Email</span>
                        <input class="input" type="email" name="email" placeholder="Nhập email lấy lại mật khẩu">
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
                            Không tìm thấy email trùng khớp
                        </div>
                    @endif

                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <button class="login-form-btn">
                                Xác nhận
                            </button>
                        </div>
                    </div>

                    <a href="{{ url('auth/google') }}" class="google-btn">
                        <div class="google-btn-box">
                            <img class="google-icon"
                                src="https://devsne.vn/image/icon/Bh9KozOvA7.png" />
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
