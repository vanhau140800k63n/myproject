@extends('layouts.master')
@section('meta')
    <style>
        .ͼ1.cm-editor {
            min-height: 100px;
            max-height: 300px !important;
        }

        .cm-scroller {
            overflow: auto;
        }
    </style>
@endsection
@section('head')
    <title>{{ $post->title }}</title>
@endsection
@section('content')
    <div class="post_box">
        <div class="post_box_category">
            
        </div>
        <div class="post_box_content">
            <div class="post_box_content_title">{{ $post->title }}</div>
            @foreach ($post_detail as $item)
                <div class="post_content">
                    <div class="post_content_head">
                        <div class="post_content_title">{{ $item->title }}</div>
                        @if ($item->type !== 'text' && $item->compiler === 1)
                            <button class="run_code"> Run code </button>
                        @endif
                    </div>
                    @if ($item->type === 'text')
                        {!! $item->content !!}
                    @else
                        <div class="post_card" id="{{ $item->p_language_id . $item->id }}" value="{{ $item->content }}"
                            lang="{{ $item->p_language_id }}"></div>
                        @if ($item->compiler === 1)
                            <div class="compiler_code_title">
                                {{ $item->p_language_id != 'html' ? 'Compiler' : 'HTML Iframe' }}
                                <div class="lds-ring">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            @if ($item->p_language_id != 'html')
                                <div class="compiler_code" id="compiler{{ $item->p_language_id . $item->id }}"></div>
                            @else
                                <div class="compiler_html" id="html{{ $item->p_language_id . $item->id }}"></div>
                            @endif
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
        <div class="post_box_other">
            <?php
            $course_list = \App\Models\PLanguage::all();
            $i = 0;
            ?>
            <div class="other_course_list">
                @foreach ($course_list as $course_item)
                    <div class="other_course_item">
                        @if ($i % 2 == 0)
                            <div style="width:10%"> </div>
                        @endif
                        <a href="{{ route('learn.lesson_intro', ['course' => $course_item->name]) }}"
                            class="other_course_item_text" style="background: {{ $course_item->color }}; width:90%">
                            <div>Khóa học
                                {{ $course_item->full_name }}</div>
                        </a>
                        @if ($i % 2 == 1)
                            <div style="width:10%"> </div>
                        @endif
                        <?php
                        ++$i;
                        ?>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="{{ asset(mix('js/post.js')) }}"></script>
@endsection
