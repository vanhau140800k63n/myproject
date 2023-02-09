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
        <div class="home_lession">
            @foreach ($p_languages as $p_language)
                <div class="home_lession_item">
                    <input id="input_{{ $p_language->name }}" value="{{ $p_language->home_content }}"
                        color="{{ $p_language->color }}" hidden>
                    <div class="home_lession_card" id="{{ $p_language->name }}"></div>
                    <div class="home_lession_cover"></div>
                    <a class="home_lession_info" href="{{ route('learn.lesson_intro', ['course' => $p_language->name]) }}">
                        Học {{ $p_language->full_name }} miễn phí
                    </a>
                    {{-- <button class="submit"> submit </button> --}}
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset(mix('js/code-mirror.js')) }}"></script>
@endsection
