@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, Cpp, HTML, css, javascript">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
@endsection
@section('head')
    <title>{{ $key }} - devsnevn</title>
@endsection
@section('content')
    <div class="search_advance_box">
        <div class="search_advance_title"> Tìm kiếm: {{ $key }} </div>
        <div class="home_post">
            @foreach ($lessons as $lesson)
                <div class="home_post_item">
                    <a class="home_post_content"
                        href="{{ route('learn.lesson_detail', ['course' => $lesson->course_name, 'slug' => $lesson->slug]) }}">
                        <img class="home_post_img" src="{{ asset($lesson->image) }}">
                        <div class="home_post_img_cover">
                            <button class="home_post_btn_show">Xem thêm</button>
                        </div>
                        {{-- <div class="home_post_view"><i class="fa-solid fa-eye"></i>{{ $post->view }} lượt xem</div> --}}
                        {{-- <div class="home_post_img_title">{{ $lesson->title }}</div> --}}
                        <p class="home_post_item_title">{{ $lesson->title }}</p>
                    </a>
                    {{-- <a href="{{ route('user_detail', ['id' => $post->author_id]) }}" class="home_post_author">
                    <img class="home_post_author_img" src="{{ $post->author_avata }}">
                    <div class="home_post_author_name"> {{ $post->author_name }}</div>
                </a> --}}
                </div>
            @endforeach
            @foreach ($posts as $post)
                <div class="home_post_item">
                    <a class="home_post_content" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                        <img class="home_post_img" src="{{ asset($post->image) }}">
                        <div class="home_post_img_cover">
                            <button class="home_post_btn_show">Xem thêm</button>
                        </div>
                        <div class="home_post_view"><i class="fa-solid fa-eye"></i>{{ $post->view }} lượt xem</div>
                        <p class="home_post_item_title">{{ $post->title }}</p>
                    </a>
                    <a href="{{ route('user_detail', ['id' => $post->author_id]) }}" class="home_post_author">
                        <img class="home_post_author_img" src="{{ asset($post->author_avata) }}">
                        <div class="home_post_author_name"> {{ $post->author_name }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
