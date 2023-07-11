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
        .ͼ1.cm-editor {
            max-height: 300px !important;
        }

        .cm-scroller {
            overflow: auto;
        }
    </style>

    @if (in_array($course->id, [7, 10, 11]))
        <link rel="stylesheet" href="{{ asset(mix('css/lesson_update.css')) }}">
    @endif
    @if (in_array($course->id, [7, 10]))
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/a11y-dark.min.css">
        <script>
            hljs.highlightAll();
        </script>
    @else
        <link rel="stylesheet" href="{{ asset(mix('lib/tinymce/skins/ui/oxide/content.min.css')) }}">
    @endif
@endsection
@section('head')
    <title>{{ $lesson->title }} | DEVSNE</title>
@endsection
@section('content')
    <div class="lesson_box">
        <div class="post_noti">

        </div>
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
        <main class="lesson_box_content">
            <div class="lesson_box_content_title">{{ $lesson->title }}</div>
            {{-- <a href="{{ route('exam.home') }}">
                <div class="contest_banner">
                    <div class="playful">
                        <span aria-hidden="true">C</span>
                        <span aria-hidden="true">o</span>
                        <span aria-hidden="true">d</span>
                        <span aria-hidden="true">i</span>
                        <span aria-hidden="true">n</span>
                        <span aria-hidden="true">g</span>
                        <span aria-hidden="true">&nbsp;</span>
                        <span aria-hidden="true">C</span>
                        <span aria-hidden="true">h</span>
                        <span aria-hidden="true">a</span>
                        <span aria-hidden="true">l</span>
                        <span aria-hidden="true">l</span>
                        <span aria-hidden="true">e</span>
                        <span aria-hidden="true">n</span>
                        <span aria-hidden="true">g</span>
                        <span aria-hidden="true">e</span>
                    </div>

                    <div class="playful small">
                        <span aria-hidden="true">J</span>
                        <span aria-hidden="true">a</span>
                        <span aria-hidden="true">v</span>
                        <span aria-hidden="true">a</span>
                        <span aria-hidden="true">&nbsp;</span>
                        <span aria-hidden="true">C</span>
                        <span aria-hidden="true">+</span>
                        <span aria-hidden="true">+</span>
                        <span aria-hidden="true">&nbsp;</span>
                        <span aria-hidden="true">P</span>
                        <span aria-hidden="true">y</span>
                        <span aria-hidden="true">t</span>
                        <span aria-hidden="true">h</span>
                        <span aria-hidden="true">o</span>
                        <span aria-hidden="true">n</span>
                    </div>
                    <div class="banner_info">
                        <div class="banner_info_item">
                            <img class="b_i_t_img_title" src="{{ asset('image/giftbox.png') }}">
                            <div class="b_i_t_text">Bàn phím cơ Rapoo V500 Pro Yellow Blue</div>
                        </div>
                        <div class="banner_info_item">
                            <img class="b_i_t_img_title" src="{{ asset('image/coding.png') }}">
                            <div class="b_i_t_text">Java, C++, Python, PHP, JavaScript</div>
                        </div>
                        <div class="banner_info_item">
                            <img class="b_i_t_img_title" src="{{ asset('image/algorithm.png') }}">
                            <div class="b_i_t_text">Kiến thức, cấu trúc dữ liệu & giải thuật</div>
                        </div>
                    </div>
                </div>
            </a> --}}
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6922352342278341"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block; text-align:center; margin-bottom: 50px" data-ad-layout="in-article"
            data-ad-format="fluid" data-ad-client="ca-pub-6922352342278341" data-ad-slot="4359770305"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
            @foreach ($lesson_detail as $item)
                <article class="lesson_content">
                    <div class="lesson_content_head">
                        <div class="lesson_content_title">{{ $item->title }}</div>
                        @if ($item->type !== 'text' && intval($item->compiler) === 1)
                            <button class="run_code"> Run code </button>
                        @endif
                    </div>
                    @if ($item->type === 'text')
                        <div class="lesson_content_text">
                            {!! $item->content !!}
                        </div>
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
                </article>
            @endforeach
            <div class="lesson_pre_next">
                <a class="lesson_pre_btn" href="{{ $pre_lesson }}"> Bài trước </a>
                <a class="lesson_next_btn" href="{{ $next_lesson }}"> Bài sau </a>
            </div>
            @if ($posts_related->count() > 0)
                <div class="api_list_title">Một số bài viết liên quan</div>
                <div class="post_list">
                    @foreach ($posts_related as $related_post)
                        <div class="post_list_item">
                            <div class="post_list_item_info">
                                <a>
                                    <img src="{{ asset($related_post->author_avata) }}">
                                    <span>{{ $related_post->author_name }}</span>
                                    <span style="color: #7d5d53">{{ $related_post->view }} lượt xem</span>
                                </a>
                                <a href="{{ route('post.detail', ['slug' => $related_post->slug]) }}">
                                    <h2>{{ $related_post->title }}</h2>
                                </a>
                                <?php $categories = App\Models\Category::whereIn('id', explode('-', $related_post->category))->get(); ?>
                                <div style="display: flex; flex-wrap: wrap; margin-top: 10px">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('search', $category->title) }}" class="post_info_category_item">
                                            {{ $category->title }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a class="post_list_item_img"
                                href="{{ route('post.detail', ['slug' => $related_post->slug]) }}"><img
                                    src="{{ asset($related_post->image) }}"></a>
                        </div>
                    @endforeach
                </div>
            @endif
        </main>
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
                    <div class="icon_filters_item" style="margin-bottom: 30px">
                        <a href="{{ route('icon.search', ['word' => 'contest']) }}">
                            <div class="i_f_i_banner_a">
                                <div class="i_f_i_banner_title" style="font-weight: 600;"> Free Contest Icons
                                </div>
                                <img class="icon_search_example" src="{{ asset('image/contest_icons.png') }}">
                            </div>
                        </a>
                        <a href="{{ route('icon.search', ['word' => 'game']) }}">
                            <div class="i_f_i_banner_a" style="margin-top: 30px">
                                <div class="i_f_i_banner_title" style="font-weight: 600;">
                                    Free
                                    Game Icons </div>
                                <img class="icon_search_example" src="{{ asset('image/game_icons.png') }}">
                            </div>
                        </a>
                    </div>
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
            </div>
        </div>
    </div>
    <script src="{{ asset(mix('js/code-mirror.js')) }}"></script>
@endsection
