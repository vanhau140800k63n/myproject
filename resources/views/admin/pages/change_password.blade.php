@extends('admin.master_auth')
@section('head')
    <title>Đăng nhập - Devsne</title>
@endsection

@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <form class="login-form" method="POST" action="{{ route('change_password_confirm') }}">
                    @csrf
                    <span class="login-form-title">
                        Đổi mật khẩu
                    </span>

                    <div class="form-noti" style="margin-bottom: 20px">
                        Tài khoản
                        <span>
                            {{ $email }}
                        </span>
                    </div>

                    <div class="wrap-input">
                        <span class="label-input">Mật khẩu</span>
                        <input class="input" type="password" name="pass" placeholder="Nhập mật khẩu">
                        <span class="focus-input" data-symbol="∙"></span>
                    </div>

                    <div class="wrap-input">
                        <span class="label-input">Nhập lại mật khẩu</span>
                        <input class="input" type="password" name="pass" placeholder="Nhập mật khẩu">
                        <span class="focus-input" data-symbol="∙"></span>
                    </div>

                    @if (count($errors) > 0)
                        <div class="error-text">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif

                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <button class="login-form-btn">
                                Đổi mật khẩu
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
