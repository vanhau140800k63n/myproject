@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="{{ $post->title }}, Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, Cpp, HTML, css, javascript,{{ $post->meta }}">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description"
        content="{{ $post->title }}, Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="{{ $post->title }}">
    <meta property="article:publisher" content="https://www.facebook.com/devsne.official">
    <meta property="og:image" content="{{ asset($post->image) }}">
    <style>
        .ͼ1.cm-editor {
            max-height: 500px !important;
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
            <div class="post_box_info">
                <div class="post_info_attr">
                    <div class="post_info_attr_date">{{ date_format($post->created_at,"H:i d/m/Y") }}</div>
                    <div class="post_info_attr_view"><i class="fa-solid fa-eye"></i>{{ $post->view }}</div>
                    <div class="post_info_attr_comment"><i class="fa-solid fa-comments"></i> 0</div>
                    <div class="post_info_attr_bookmark"><i class="fa-solid fa-bookmark"></i> 0</div>
                </div>
                <div class="post_info_category">
                    <div class="post_info_category_title">Từ khóa:</div>
                    <?php $category_titles = explode(',', $category_titles); ?>
                    @foreach ($category_titles as $category_title)
                        <div class="post_info_category_item"> {{ $category_title }}</div>
                    @endforeach
                </div>
            </div>
            @foreach ($post_detail as $item)
                <div class="post_content">
                    <div class="post_content_head">
                        <div class="post_content_title">{{ $item->title }}</div>
                        @if ($item->type !== 'text' && intval($item->compiler) === 1)
                            <button class="run_code"> Run code </button>
                        @endif
                    </div>
                    @if ($item->type === 'text')
                        <div class="post_content_text">
                            {!! $item->content !!}
                        </div>
                    @else
                        <div class="post_card" id="{{ $item->p_language_id . $item->id }}" value="{{ $item->content }}"
                            lang="{{ $item->p_language_id }}">
                            @if ($item->type !== 'text')
                                <button class="copy_code"> Copy </button>
                            @endif
                        </div>
                        @if (intval($item->compiler) === 1)
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
            <div class="post_box_other_fixed">
                <div class="post_info_author">
                    <img class="post_author_info_img" src="{{ asset($author->avata) }}">
                    <a href="{{ route('user_detail', ['id' => $author->id]) }}" class="post_author_info_name"> {{ $author->last_name . ' ' . $author->first_name }} </a>
                    <button class="post_author_btn_follow">Theo dõi</button>
                </div>
                <div class="catalogue">
                    <div class="catalogue_title">Mục lục</div>
                    <div class="catalogue_content">
                        <?php
                        $catalogue_item_index = 2;
                        ?>
                        @foreach ($post_detail as $catalogue_item)
                            <div class="catalogue_item_title" index="{{ ++$catalogue_item_index }}">
                                {{ $catalogue_item->title }}</div>
                        @endforeach
                    </div>
                </div>
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
    </div>
    <script src="{{ asset(mix('js/post.js')) }}"></script>
@endsection
