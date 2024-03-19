@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="30 khóa học miễn phí về html, css, javascript, python, java, c++. Cùng với hơn 1000 free template">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, Cpp, HTML, css, javascript">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
@endsection
@section('head')
    <title>Tìm hiểu về {{ $key }} | 30 Khóa Học Lập Trình Miễn Phí</title>
@endsection
@section('content')
    <main class="search_advance_box">
        <div class="search_advance_title"> Tìm kiếm: {{ $key }} </div>
        <div class="home_post">
            @foreach ($lessons as $lesson)
                <article class="home_post_item">
                    <a class="home_post_content"
                        href="{{ route('learn.lesson_detail', ['course' => $lesson->course_name, 'slug' => $lesson->slug]) }}">
                        <img class="home_post_img" src="{{ asset($lesson->image) }}">
                        <div class="home_post_img_cover">
                            <button class="home_post_btn_show">Xem thêm</button>
                        </div>
                        <p class="home_post_item_title">{{ $lesson->title }}</p>
                    </a>
                </article>
            @endforeach
            @foreach ($posts as $post)
                <article class="home_post_item">
                    <a class="home_post_content" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                        <img class="home_post_img" src="{{ asset($post->image) }}">
                        <div class="home_post_img_cover">
                            <button class="home_post_btn_show">Xem thêm</button>
                        </div>
                        <div class="home_post_view"><i class="fa-solid fa-eye"></i>{{ $post->view }} lượt xem</div>
                        <p class="home_post_item_title">{{ $post->title }}</p>
                    </a>
                    <div class="home_post_author">
                        <a href="{{ route('profile', ['id' => $post->author_id]) }}" style="display: flex">
                            <img class="home_post_author_img" src="{{ asset($post->author_avata) }}">
                            <div class="home_post_author_name"> {{ $post->author_name }}</div>
                        </a>
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
                </article>
            @endforeach
        </div>
    </main>
@endsection
