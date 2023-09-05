@extends('admin.master_auth')
@section('head')
    <title>Trang Không Đúng | DEVSNE</title>
@endsection
@section('content')
    <div class="limiter">
        <div class="container-login" style="">
            <div class="wrap-login">
                <div class="login-form">
                    <div class="form-noti">
                        <span>
                            Trang không đúng
                        </span>
                    </div>
                </div>
            </div>
            @include('admin.pages.login_banner')
        </div>
    </div>
@endsection
