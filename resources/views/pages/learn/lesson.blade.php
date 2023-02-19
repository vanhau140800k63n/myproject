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
    <title>{{ $lesson->title }}</title>
@endsection
@section('content')
    <div class="lesson_box">
        <div class="lesson_box_category">
            <div class="lesson_box_category_fixed">
                <div class="lesson_box_category_title">Khóa học {{ $course->full_name }}</div>
                <div class="lesson_box_category_list">
                    @foreach ($lesson_list as $lesson_item)
                        <a href="{{ route('learn.lesson_detail', ['course' => $course->name, 'slug' => $lesson_item->slug]) }}"
                            class="lesson_box_category_item{{ $lesson_item->id === $lesson->id || (isset($lesson_parent->id) && $lesson_item->id === $lesson_parent->id) ? ' active' : '' }}">
                            <div>{{ $lesson_item->sub_title }}</div>
                        </a>
                        @if ($lesson_item->id === $lesson->id || (isset($lesson_parent->id) && $lesson_item->id === $lesson_parent->id))
                            @foreach ($lesson_child_list as $lesson_child_item)
                                <a href="{{ route('learn.lesson_detail', ['course' => $course->name, 'slug' => $lesson_child_item->slug]) }}"
                                    class="lesson_box_category_child_item{{ $lesson_child_item->id === $lesson->id ? ' active' : '' }}">
                                    <div>{{ $lesson_child_item->sub_title }}</div>
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="lesson_box_content">
            <div class="lesson_box_content_title">{{ $lesson->title }}</div>
            @foreach ($lesson_detail as $item)
                <div class="lesson_content">
                    <div class="lesson_content_head">
                        <div class="lesson_content_title">{{ $item->title }}</div>
                        @if ($item->type !== 'text' && intval($item->compiler) === 1)
                            <button class="run_code"> Run code </button>
                        @endif
                    </div>
                    @if ($item->type === 'text')
                        {!! $item->content !!}
                    @else
                        <div class="lesson_card" id="{{ $item->p_language_id . $item->id }}" value="{{ $item->content }}"
                            lang="{{ $item->p_language_id }}"></div>
                        @if (intval($item->compiler) == 1)
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
        <div class="lesson_box_other">
            <?php
            $course_list = \App\Models\PLanguage::where('id', '!=', $course->id)->get();
            $i = 0;
            ?>
            @if ($lesson_child_list->count() > 0)
                <div class="lesson_more">
                    <div class="lesson_more_title">Tham khảo thêm</div>
                    @foreach ($lesson_child_list as $lesson_more_item)
                        <a class="lesson_more_item"
                            href="{{ route('learn.lesson_detail', ['course' => $course->name, 'slug' => $lesson_more_item->slug]) }}">{{ $lesson_more_item->title }}</a>
                    @endforeach
                </div>
            @endif
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
    <script src="{{ asset(mix('js/code-mirror.js')) }}"></script>
@endsection
