@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, Cpp, HTML, css, javascript, game, design, game-design, template">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
@endsection
@section('head')
    <title> Game Design | DEVSNE</title>
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
    <iframe src="https://trinket.io/embed/python" width="100%" height="356" frameborder="0" marginwidth="0"
        marginheight="0" allowfullscreen></iframe>
    <script>
        setTimeout(() => {
            $('iframe').attr('src', 'https://trinket.io/embed/java')
        }, 5000);
    </script>
@endsection
