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

        .contest_editer .ͼ1.cm-editor {
            height: calc(100vh - 250px) !important;
        }
    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/a11y-dark.min.css">
    <script>
        hljs.highlightAll();
    </script>
@endsection
@section('content')
    <div class="contest_design">
        <div class="contest_editer_box">
            <div class="contest_editer" value="{{ $challenge->default_code }}" lang="{{ $challenge->language }}"></div>
            <div class="contest_lg_mode">
                <button class="contest_run"> Chạy Thử </button>
                <button class="contest_submit"> Nộp Bài </button>
            </div>
            <div class="test_case">
                @for ($i = 1; $i <= $challenge->test_case_num; ++$i)
                    <div class="test_case_item">Test Case {{ $i }} </div>
                @endfor
            </div>
        </div>
        <main class="contest_creen">
            <aside class="time_countdown">
                <div class="time_countdown_bg">
                    <div class="time_countdown_el"></div>
                </div>
            </aside>
            <h1> {{ $challenge->title }} </h1>
            <div class="contest_creen_info" time="{{ $challenge->time }}">
                <p>Thời gian: {{ $challenge->time }}p</p>
                <p>Ngôn ngữ: Java</p>
            </div>
        </main>
    </div>
    <script src="{{ asset(mix('js/contest.js')) }}"></script>
@endsection
