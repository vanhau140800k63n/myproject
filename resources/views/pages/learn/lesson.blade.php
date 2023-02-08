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
@section('content')
    <div class="lesson_box">
        <div class="lesson_box_catecgory">
            <div>Khóa học {{ $course->full_name }}</div>
        </div>
        <div class="lesson_box_content">
            <div class="lesson_content">
                @foreach ($lesson_detail as $item)
                    <div class="lesson_content">
                        @if ($item->type === 'text')
                            {{ $item->content }}
                        @else
                            <div class="lession_card" id="{{ $item->p_language_id . $item->id }}" value="{{ $item->content }}"
                                lang="{{ $item->p_language_id }}"></div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="lesson_box_other"></div>
    </div>
    <script src="{{ asset(mix('js/code-mirror.js')) }}"></script>
@endsection
