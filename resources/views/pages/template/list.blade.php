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
    <title> devsnevn</title>
@endsection
@section('content')
    <div class="template_list_box">
        <div class="template_list">
            @foreach ($list_template as $template)
                <div class="template_item">
                    <h2># {{ $template->title }}</h2>
                    <iframe src="{{ $template->iframe }}"
                        style="width: 100%; {{ $template->height != null ? 'height:' . $template->height . 'px' : '' }}"
                        scrolling="no"></iframe>
                    <div class="template_item_action">
                        @if ($template->demo == 1)
                            <a target="_blank" href="{{ $template->iframe }}">Demo</a>
                        @endif
                        @if ($template->source == 1)
                            <button class="template_item_download" href="https://devsnes.github.io/source_code/test.zip" check="{{ Auth::check() ? 'download' : '' }}">Source Code</button>
                        @endif
                        @if ($template->auto != null)
                            <button class="template_item_run" value="{{ $template->auto }}">Run code</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset(mix('js/template.js')) }}"></script>
@endsection
