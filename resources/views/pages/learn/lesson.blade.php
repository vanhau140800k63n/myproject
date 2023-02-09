@extends('layouts.master')
@section('meta')
    <style>
        .cm-content,
        .cm-gutter {
            min-height: 100px;
        }

        .cm-scroller {
            overflow: auto;
        }
    </style>
@endsection
@section('head')
<title>{{ $lesson->title }}</title>
@endsection
@section('content')
    <div class="lesson_box">
        <div class="lesson_box_category">
            <div class="lesson_box_category_title">Khóa học {{ $course->full_name }}</div>
            <div class="lesson_box_category_list">
                @foreach ($lesson_list as $lesson_item)
                    <a href="{{ route('learn.lesson_detail', ['course' => $course->name, 'slug' => $lesson_item->slug]) }}"
                        class="lesson_box_category_item{{ $lesson_item->id === $lesson->id ? ' active': '' }}">{{ $lesson_item->sub_title }}</a>
                @endforeach
            </div>
        </div>
        <div class="lesson_box_content">
            <div class="lesson_box_content_title">{{ $lesson->title }}</div>
            @foreach ($lesson_detail as $item)
                <div class="lesson_content">
                    <div class="lesson_content_head">
                        <div class="lesson_content_title">{{ $item->title }}</div>
                    </div>
                    @if ($item->type === 'text')
                        {!! $item->content !!}
                    @else
                        <div class="lession_card" id="{{ $item->p_language_id . $item->id }}" value="{{ $item->content }}"
                            lang="{{ $item->p_language_id }}"></div>
                        <div class="compiler_code_title"> Compiler </div>
                        <div class="compiler_code" id="compiler{{ $item->p_language_id . $item->id }}">

                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="lesson_box_other"></div>
    </div>
    <script src="{{ asset(mix('js/code-mirror.js')) }}"></script>
@endsection
