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

        .home_post {
            gap: 1rem 1rem !important;
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
                    <div class="post_info_attr_date">{{ date_format($post->created_at, 'H:i d/m/Y') }}</div>
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

            <?php
            $api_posts = \App\Models\Post::where('type', 3)
                ->orderBy('title')
                ->get();
            ?>
            @if ($api_posts->count() > 0 && intval($post->type) == 3)
                <div class="api_list_title">Một số API khác</div>
                <div class="home_post">
                    @foreach ($api_posts as $post)
                        <div class="home_post_item">
                            <a class="home_post_content" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                                <img class="home_post_img" src="{{ asset($post->image) }}">
                                <div class="home_post_img_cover">
                                    <button class="home_post_btn_show">Xem thêm</button>
                                </div>
                                <div class="home_post_view"><i class="fa-solid fa-eye"></i>{{ $post->view }} lượt xem
                                </div>
                                <p class="home_post_item_title">{{ $post->title }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="comment_box">
                <div class="cmt_title">Bình luận</div>
                <div class="comment_input">
                    @if (\Illuminate\Support\Facades\Auth::check())
                        <?php
                            $user =  \Illuminate\Support\Facades\Auth::user();
                        ?>
                        <img class="cmt_img" src="{{ asset($user->avata) }}">
                        <input class="cmt_input" type="text" uid="{{ $user->id }}" tid="{{ $post->id }}">
                        <button class="cmt_btn">Đăng</button>
                    @else
                        <div>Vui lòng <a style="color: rgb(44, 44, 229); font-weight: 500" href="{{ route('login') }}">đăng
                                nhập</a> để bình luận</div>
                    @endif
                </div>
                <div class="comment_list">
                    @foreach ($comments as $comment)
                        <div class="comment_item">
                            <div class="cmt_info">
                                <img class="cmt_info_img" src="{{ asset($comment->author_avata) }}">
                                <div class="cmt_info_name"> {{ $comment->author_name }} </div>
                                <div class="cmt_info_date"> {{ $comment->created_at }} </div>
                            </div>
                            <div class="cmt_content">{{ $comment->message }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="post_box_other">
            <div class="post_box_other_fixed">
                <div class="post_info_author">
                    <img class="post_author_info_img" src="{{ asset($author->avata) }}">
                    <a href="{{ route('user_detail', ['id' => $author->id]) }}" class="post_author_info_name">
                        {{ $author->last_name . ' ' . $author->first_name }} </a>
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
