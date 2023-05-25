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
