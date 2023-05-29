@extends('layouts.master')
@section('meta')
    <meta name="description" content="{{ $type->description }} Xem ngay">
    <meta name="keywords"
        content="devsne, devsnevn, website templates, templates, java, python, c++, cpp, html, css, javascript, free, free templates">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ route('template.list', $type->slug) }}">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $type->count }}+ Free {{ $type->title }} Template For Android, Ios, Website">
    <meta property="og:description" content="{{ $type->description }} Xem ngay">
    <meta property="og:url" content="">
    <meta property="og:site_name"
        content="{{ $type->count }}+ Free {{ $type->title }} Template For Android, Ios, Website">
    <meta property="article:publisher" content="https://www.facebook.com/devsne.official">
    <meta property="og:image" content="{{ asset('image/template.png') }}">
@endsection
@section('head')
    <title>{{ $type->count }}+ Free {{ $type->title }} Template For Android, Ios, Website | DEVSNE</title>
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
                @foreach ($list_type as $type_detail)
                    <a class="template_type_item {{ $key == $type_detail->slug ? 'active' : '' }}"
                        href="{{ route('template.list', $type_detail->slug) }}">#{{ $type_detail->slug }}({{ $type_detail->count }})</a>
                @endforeach
            </div>
        </div>
        <div class="template_list_container">
            <main class="template_list">
                @foreach ($list_template as $template)
                    <article class="template_item">
                        <h2># {{ $template->title }}</h2>
                        @if ($template->show == null)
                            <iframe src="{{ $template->iframe }}"
                                style="width: 100%; {{ $template->height != null ? 'height:' . $template->height . 'px' : '' }}"
                                scrolling="no"></iframe>
                        @else
                            <div style="display:flex; justify-content: center;align-items: center;">
                                {!! $template->show !!}
                            </div>
                        @endif
                        <div class="template_item_action">
                            @if ($template->demo == 1)
                                <a target="_blank" href="{{ $template->iframe }}" class="button">
                                    <div class="button__line"></div>
                                    <div class="button__line"></div>
                                    <span
                                        class="button__text">{{ $template->download_url != null ? 'Demo' : 'Demo And Code' }}</span>
                                </a>
                            @endif
                            @if ($template->source == 1)
                                <button class="button template_item_download" href="{{ $template->download_url }}"
                                    check="{{ Auth::check() ? 'download' : '' }}">
                                    <div class="button__line"></div>
                                    <div class="button__line"></div>
                                    <span class="button__text">Download</span>
                                </button>
                            @endif
                            @if ($template->auto != null)
                                <button class="button template_item_run" value="{{ $template->auto }}">
                                    <div class="button__line"></div>
                                    <div class="button__line"></div>
                                    <span class="button__text">Run</span>
                                </button>
                            @endif
                        </div>
                    </article>
                @endforeach
                {{ $list_template->links('partial.pagination') }}
            </main>
            <aside class="template_list_other">
                @foreach ($list_type_all as $type_detail)
                    <a class="template_list_other_item {{ $key == $type_detail->slug ? 'active' : '' }}"
                        href="{{ route('template.list', $type_detail->slug) }}">#{{ $type_detail->slug }}({{ $type_detail->count }})</a>
                @endforeach
            </aside>
        </div>
    </div>
    <script src="{{ asset(mix('js/template.js')) }}"></script>
@endsection
