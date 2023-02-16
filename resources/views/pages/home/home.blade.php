@extends('layouts.master')
@section('meta')
    <style>
        .cm-content,
        .cm-gutter {
            min-height: 460px;
        }

        .cm-scroller {
            overflow: auto;
        }
    </style>
@endsection
@section('head')
    <title>Trang chủ</title>
@endsection
@section('content')
    <div class="box">
        <h2 class="home_title">Khóa học</h2>
        <div class="home_lession">
            @foreach ($p_languages as $p_language)
                <div class="home_lession_item">
                    <input id="input_{{ $p_language->name }}" value="{{ $p_language->home_content }}"
                        color="{{ $p_language->color }}" hidden>
                    <div class="home_lession_card" id="{{ $p_language->name }}"></div>
                    <a href="{{ route('learn.lesson_intro', ['course' => $p_language->name]) }}">
                        <div class="home_lession_cover"></div>
                    </a>
                    <a class="home_lession_info" href="{{ route('learn.lesson_intro', ['course' => $p_language->name]) }}">
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
                    <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                        <img class="home_post_img" src="{{ $post->image }}">
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