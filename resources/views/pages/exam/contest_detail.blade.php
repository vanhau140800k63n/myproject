@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, Cpp, HTML, css, javascript, contest, design, contest-design, template">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
@endsection
@section('head')
    <title> Online Contest | DEVSNE</title>
    <style>
        .footer_box {
            display: none;
        }

        .header-box {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="contest_design">
        <div class="contest_editer_box">
            <div class="contest_editer"></div>
            <div class="contest_lg_mode">
                <button class="contest_run"> Chạy Thử </button>
                <button class="contest_run"> Nộp Bài </button>
            </div>
            <div class="test_case">
                <div class="test_case_item">Test Case 1 <i class="fa-solid fa-circle-check"></i></div>
                <div class="test_case_item">Test Case 2 <i class="fa-solid fa-circle-check"></i></div>
                <div class="test_case_item error">Test Case 3 <i class="fa-solid fa-circle-xmark"></i></div>
            </div>
        </div>
        <div class="contest_creen">

        </div>
    </div>
    <script src="{{ asset(mix('js/contest.js')) }}"></script>
@endsection
