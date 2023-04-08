@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <title>Thông tin người dùng</title>
@endsection
@section('content')
    <div class="box">
        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="user_box">
                <div class="user_image">
                    <div class="card">
                        <div class="card_header">Ảnh đại diện</div>
                        <div class="card_body text_center">
                            <img class="img_account_profile rounded_circle"
                                src="{{ isset($user->avata) ? asset($user->avata) : asset('img/no_avata.jpg') }}"
                                alt="">
                            <div class="post_img_noti">Ảnh JPG hoặc PNG nhở hơn 5MB </div>
                            <input type="file" id="post_avata" name="avata" hidden accept="image/*">
                            <button class="post_img_btn" type="button"
                                onclick="document.getElementById('post_avata').click()">Tải ảnh
                                <i class="fa-solid fa-upload"></i></button>
                        </div>
                    </div>
                </div>
                <div class="user_info card">
                    <div class="card_header">Thông tin người dùng</div>
                    <div class="card_body">
                        <div class="user_info_name">
                            <div class="user_info_name_detail">
                                <label class="user_info_label" for="first_name">Họ</label>
                                <input class="user_info_input" id="first_name" type="text" name="first_name"
                                    value="{{ $user->first_name }}">
                            </div>
                            <div class="user_info_name_detail">
                                <label class="user_info_label" for="last_name">Tên</label>
                                <input class="user_info_input" id="last_name" type="text" name="last_name"
                                    value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="user_info_item">
                            <label class="user_info_label" for="email">Địa chỉ email</label>
                            <input class="user_info_input" id="email" type="email" value="{{ $user->email }}"
                                disabled>
                        </div>

                        <div class="user_info_item">
                            <label class="user_info_label" for="phone">Số điện thoại</label>
                            <input class="user_info_input" id="phone" type="text" name="phone"
                                value="{{ $user->phone }}">
                        </div>

                        <div class="user_info_action">
                            <button class="user_info_btn_save" type="submit">Lưu thay đổi</button>
                            <a class="user_info_btn_logout" href="{{ route('logout') }}">Đăng xuất</a>
                            <div class="form_submit_noti"> {{ Session::get('noti') }} </div>
                            <div class="form_submit_error"> {{ Session::get('error') }} </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="home_post" style="padding: 20px; margin-top: 50px">
            @foreach ($posts as $post)
                <div class="home_post_item">
                    <a class="home_post_content" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                        <img class="home_post_img" src="{{ asset($post->image) }}">
                        <div class="home_post_img_cover">
                            <button class="home_post_btn_show">Xem thêm</button>
                        </div>
                        <div class="home_post_view"><i class="fa-solid fa-eye"></i>{{ $post->view }} lượt xem
                        </div>
                        <p class="home_post_item_title">{{ $post->title }}</p>
                    </a>
                    <div class="home_post_author">
                        <div class="home_post_action">
                            <?php
                            $save_action = '';
                            $like_action = '';
                            if (\Illuminate\Support\Facades\Auth::check()) {
                                $user = \Illuminate\Support\Facades\Auth::user();
                                $save_action =
                                    \App\Models\Action::where('type', 3)
                                        ->where('user_id', $user->id)
                                        ->where('post_id', $post->id)
                                        ->get()
                                        ->count() >= 1
                                        ? 'active'
                                        : '';
                                $like_action =
                                    \App\Models\Action::where('type', 4)
                                        ->where('user_id', $user->id)
                                        ->where('post_id', $post->id)
                                        ->get()
                                        ->count() >= 1
                                        ? 'active'
                                        : '';
                            }
                            ?>
                            <i action="3" post_id="{{ $post->id }}"
                                class="fa-solid fa-bookmark {{ $save_action }}"></i>
                            <i action="4" post_id="{{ $post->id }}"
                                class="fa-solid fa-heart {{ $like_action }}"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="height: 300px"></div>
    </div>
@endsection
