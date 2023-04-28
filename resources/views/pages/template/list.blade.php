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
    <title> Danh sánh template {{ $key }} - devsnevn</title>
@endsection
@section('content')
    <div class="template_list_box">
        <div class="template_list_type">
            <div class="text text-1">T</div>
            <div class="text text-2">E</div>
            <div class="text text-3">M</div>
            <div class="text text-4">P</div>
            <div class="text text-1">L</div>
            <div class="text text-2">A</div>
            <div class="text text-3">T</div>
            <div class="text text-4">E</div>
            <div class="template_type">
                @foreach ($list_type as $type)
                    <a class="template_type_item {{ $key == $type->slug ? 'active' : '' }}"
                        href="{{ route('template.list', $type->slug) }}">#{{ $type->slug }}</a>
                @endforeach
            </div>
        </div>
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
                            <button class="template_item_download" href="{{ $template->download_url }}"
                                check="{{ Auth::check() ? 'download' : '' }}">Source Code</button>
                        @endif
                        @if ($template->auto != null)
                            <button class="template_item_run" value="{{ $template->auto }}">Run code</button>
                        @endif
                    </div>
                </div>
            @endforeach
            {{ $list_template->links('partial.pagination') }}
        </div>
    </div>
    <script src="{{ asset(mix('js/template.js')) }}"></script>
@endsection
