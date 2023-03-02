@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, cpp, html, css, javascript, Khóa học Lập trình Miễn phí, Khóa học Lập trình Với Giá 0, Khóa học Lập trình Trực tuyến,Học Lập trình Miễn phí,Học Lập trình Trực tuyến,Lập trình Khóa học Miễn phí,Lập trình Khóa học Trực tuyến,Khóa học Lập trình Online,Học Lập trình Online,Lập trình Khóa học Online,Lập trình Khóa học Miễn phí Trực tuyến,Khóa học Lập trình Dành cho Người mới,Học Lập trình Miễn phí Trực tuyến,Học Lập trình Trực tuyến Online,Khóa học Lập trình Trực tuyến Miễn phí">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://devsne.vn/">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Khóa học lập trình miễn phí - DEVSNE.VN">
    <meta property="og:description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta property="og:url" content="https://devsne.vn/">
    <meta property="og:site_name" content="DEVSNE.VN">
    <meta property="article:publisher" content="https://www.facebook.com/devsne.official">
    <meta property="og:image" content="">
@endsection
@section('head')
    <title>Trang chủ - Khóa học lập trình miễn phí</title>
@endsection
@section('content')
    <div class="box">
        <h2 class="home_title">Khóa học</h2>
        <div class="home_lesson">
            @foreach ($p_languages as $p_language)
                <div class="home_lesson_item">
                    <input id="input_{{ $p_language->name }}" value="{{ $p_language->home_content }}"
                        color="{{ $p_language->color }}" hidden>
                    <div class="home_lesson_card" id="{{ $p_language->name }}"></div>
                    <a href="{{ route('learn.lesson_intro', ['course' => $p_language->name]) }}">
                        <div class="home_lesson_cover"></div>
                    </a>
                    <a class="home_lesson_info" href="{{ route('learn.lesson_intro', ['course' => $p_language->name]) }}">
                        Học {{ $p_language->full_name }} miễn phí
                    </a>
                    {{-- <button class="submit"> submit </button> --}}
                </div>
            @endforeach
        </div>
        <h2 class="home_title">Bài viết nổi bật</h2>
        <div class="home_post">
            @foreach ($post_list as $post)
                <div class="home_post_item">
                    <a class="home_post_content" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                        <img class="home_post_img" src="{{ $post->image }}">
                        <div class="home_post_img_cover">
                            <button class="home_post_btn_show">Xem thêm</button>
                        </div>
                        <div class="home_post_view"><i class="fa-solid fa-eye"></i>{{ $post->view }} lượt xem</div>
                        <p class="home_post_item_title">{{ $post->title }}</p>
                    </a>
                    <a href="" class="home_post_author">
                        <img class="home_post_author_img" src="{{ $post->author_avata }}">
                        <div class="home_post_author_name"> {{ $post->author_name }}</div>
                    </a>
                </div>
            @endforeach
        </div>
        <h2 class="home_title">Xem thêm</h2>
    </div>
    <script src="{{ asset(mix('js/code-mirror.js')) }}"></script>
@endsection
