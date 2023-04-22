@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, Cpp, HTML, css, javascript">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Trình biên dịch tự động HTML JS CSS">
    <meta property="og:description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="Trình biên dịch tự động HTML JS CSS">
    <meta property="article:publisher" content="https://www.facebook.com/devsne.official">
    <meta property="og:image" content="">
    <style>
        .ͼ1.cm-editor {
            height: 700px !important;
        }

        .cm-scroller {
            overflow: auto;
        }

        .home_post {
            gap: 1rem 1rem !important;
        }
    </style>
@endsection
@section('head')
    <title>Trình biên dịch tự động HTML JS CSS</title>
@endsection
@section('content')
    <div class="post_box">
        <div class="post_box_category">
        </div>
        <div class="post_box_content">
            <div class="post_box_content_title">Trình biên dịch tự động HTML JS CSS</div>
            <div class="post_content">
                <div class="post_content_head">
                    <div class="post_content_title">
                    </div>
                    <button class="compile_html" value="post"> Compile code </button>
                </div>
                <div class="post_card" id="auto_compile_html" value=""
                    lang="html" auto="0">
                    <button class="copy_code"> Copy </button>
                </div>
            </div>
        </div>
        <div class="post_box_other">
            <div class="post_box_other_fixed">
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
                                class="other_course_item_text"
                                style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png'), {{ $course_item->color }}; width:90%">
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
                <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@devsnevn" data-unique-id="devsnevn"
                    data-embed-type="creator" style="width: fit-content; max-width: 300px">
                    <section> <a target="_blank" href="https://www.tiktok.com/@devsnevn?refer=creator_embed">@devsnevn</a>
                    </section>
                </blockquote>
                <script async src="https://www.tiktok.com/embed.js"></script>
            </div>
        </div>
    </div>
    <script src="{{ asset(mix('js/post.js')) }}"></script>
@endsection
