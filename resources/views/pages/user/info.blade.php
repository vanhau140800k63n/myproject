@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <title>Thông tin người dùng</title>
@endsection
@section('content')
    <div class="box">
        <form>
            <div class="user_box">
                <div class="user_image">
                    <div class="card">
                        <div class="card_header">Ảnh đại diện</div>
                        <div class="card_body text_center">
                            <img class="img_account_profile rounded_circle" src="{{ isset($user->avata) ? $user->avata : asset('img/no_avata.jpg') }}"
                                alt="">
                            <div class="post_img_noti">Ảnh JPG hoặc PNG nhở hơn 5MB </div>
                            <input style="display:none" type="file" id="post_avata">
                            <button class="post_img_btn" type="button"
                                onclick="document.getElementById('post_avata').click()">Tải ảnh</button>
                        </div>
                    </div>
                </div>
                <div class="user_info card">
                    <div class="card_header">Thông tin người dùng</div>
                    <div class="card_body">
                        <div class="user_info_name">
                            <div class="user_info_name_detail">
                                <label class="user_info_label" for="first_name">Họ</label>
                                <input class="user_info_input" id="first_name" type="text"
                                    value="{{ $user->first_name }}">
                            </div>
                            <div class="user_info_name_detail">
                                <label class="user_info_label" for="last_name">Tên</label>
                                <input class="user_info_input" id="last_name" type="text" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="user_info_item">
                            <label class="user_info_label" for="email">Địa chỉ email</label>
                            <input class="user_info_input" id="email" type="email" value="{{ $user->email }}">
                        </div>

                        <div class="user_info_item">
                            <label class="user_info_label" for="phone">Số điện thoại</label>
                            <input class="user_info_input" id="phone" type="text" value="{{ $user->phone }}">
                        </div>

                        <div class="user_info_action">
                            <button class="user_info_btn_save" type="submit">Lưu thay đổi</button>
                            <a class="user_info_btn_logout" href="{{ route('logout') }}">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
