@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="{{ $lesson->title }}, Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, Cpp, HTML, css, javascript,{{ $lesson->meta }}">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ route('learn.lesson_detail', ['course' => $course->name, 'slug' => $lesson->slug]) }}">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $lesson->title }} - Khóa học lập trình miễn phí">
    <meta property="og:description"
        content="{{ $lesson->title }}, Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta property="og:url"
        content="{{ route('learn.lesson_detail', ['course' => $course->name, 'slug' => $lesson->slug]) }}">
    <meta property="og:site_name" content="{{ $lesson->title }}">
    <meta property="article:publisher" content="https://www.facebook.com/devsne.official">
    <meta property="og:image" content="{{ asset($course->image) }}">
    <style>
        .cm-content,
        .cm-gutter {
            /* min-height: 100px; */
        }

        .ͼ1.cm-editor {
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
            <div class="lesson_box_category_toggle"></div>
            <div class="lesson_box_category_toggle_show"><i class="fa-solid fa-list"></i></div>
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
                            lang="{{ $item->p_language_id }}">
                            @if ($item->type !== 'text')
                                <button class="copy_code"> Copy </button>
                            @endif
                        </div>
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
            <div class="lesson_pre_next">
                <a class="lesson_pre_btn" href="{{ $pre_lesson }}"> Bài trước </a>
                <a class="lesson_next_btn" href="{{ $next_lesson }}"> Bài sau </a>
            </div>
        </div>
        <div class="lesson_box_other">
            <div class="lesson_box_other_fixed">
                <div class="catalogue">
                    <div class="catalogue_title">Mục lục</div>
                    <div class="catalogue_content">
                        <?php
                        $catalogue_item_index = 1;
                        ?>
                        @foreach ($lesson_detail as $catalogue_item)
                            <div class="catalogue_item_title" index="{{ ++$catalogue_item_index }}">
                                {{ $catalogue_item->title }}</div>
                        @endforeach
                    </div>
                </div>
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
    </div>
    <script src="{{ asset(mix('js/code-mirror.js')) }}"></script>
@endsection
