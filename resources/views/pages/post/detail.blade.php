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
            @if ($auto == 0)
                max-height: 500px !important;
            @else
                height: 700px !important;
            @endif
        }

        .cm-scroller {
            overflow: auto;
        }

        .home_post {
            gap: 1rem 1rem !important;
        }

        .post_box_other_fixed iframe {
            width: 100% !important;
        }
    </style>
    @if ($theme == 1)
        <link rel="stylesheet" href="{{ asset(mix('lib/tinymce/skins/ui/oxide/content.min.css')) }}">
    @endif
    <link rel="stylesheet" href="{{ asset(mix('css/update.css')) }}">
    @if ($theme == 2)
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/a11y-dark.min.css">
        <script>
            hljs.highlightAll();
        </script>
    @endif
@endsection
@section('head')
    <title>{{ $post->title }} | DEVSNE</title>
@endsection
@section('content')
    <div class="post_box">
        <div class="post_noti">

        </div>
        <main class="post_box_content">
            <div class="post_box_content_title">{{ $post->title }}</div>
            <aside class="post_box_info">
                <div class="post_info_attr">
                    <div class="post_info_attr_date">
                        {{ $post->created_at != null ? date_format($post->created_at, 'H:i d/m/Y') : '' }}</div>
                    <div class="post_info_attr_view"><i class="fa-solid fa-eye"></i>{{ $post->view }}</div>
                    <div class="post_info_attr_comment"><i class="fa-solid fa-comments"></i> {{ $comments->count() }}</div>
                    <?php
                    $save_action = '';
                    $like_action = '';
                    if (\Illuminate\Support\Facades\Auth::check()) {
                        $check = true;
                        $user = \Illuminate\Support\Facades\Auth::user();
                        $save_action =
                            \App\Models\Action::where('type', 3)
                                ->where('user_id', $user->id)
                                ->where('post_id', $post->id)
                                ->get()
                                ->count() >= 1
                                ? 'active'
                                : '';
                        $like_action =
                            \App\Models\Action::where('type', 4)
                                ->where('user_id', $user->id)
                                ->where('post_id', $post->id)
                                ->get()
                                ->count() >= 1
                                ? 'active'
                                : '';
                    } else {
                        $check = false;
                    }
                    ?>
                    <div class="post_info_attr_action"><i action="3" post_id="{{ $post->id }}"
                            class="fa-solid fa-bookmark {{ $save_action }}"></i> 0</div>
                    <div class="post_info_attr_action"> <i action="4" post_id="{{ $post->id }}"
                            class="fa-solid fa-heart {{ $like_action }}"></i> 0</div>
                </div>
                <div class="post_info_category">
                    <div class="post_info_category_title">Để xuất:</div>
                    <?php $category_titles = explode(',', $category_titles); ?>
                    @foreach ($category_titles as $category_title)
                        @if ($category_title != '')
                            <a href="{{ route('search', $category_title) }}" class="post_info_category_item">
                                {{ $category_title }}</a>
                        @endif
                    @endforeach
                </div>
            </aside>
            <aside class="banner_box">
                <a class="banner_text" href="{{ route('template.list', 'website') }}">1000+ free template</a>
                <div class="banner_text_item_list">
                    @foreach ($template_banner as $template_banner_item)
                        <article class="banner_text_item">
                            <a href="{{ route('template.list', $template_banner_item->url) }}">
                                {!! $template_banner_item->show !!}
                                <h4 class="banner_text_item_title"> {{ $template_banner_item->title }} HTML CSS Template
                                </h4>
                            </a>
                        </article>
                    @endforeach
                </div>
            </aside>
            @foreach ($post_detail as $item)
                <article class="post_content">
                    <div class="post_content_head">
                        <div class="post_content_title">{{ $item->title == 'Let\'s get started' ? '' : $item->title }}
                        </div>
                        @if ($item->type !== 'text' && intval($item->auto) === 1)
                            <button class="compile_html"> Compile code </button>
                        @endif
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
                            lang="{{ $item->p_language_id }}" auto="{{ $item->auto }}">
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
                </article>
            @endforeach

            @if ($post->source != null)
                <p style="float: right"> Nguồn: {{ $post->source }}</p>
            @endif

            <?php
            $api_posts = \App\Models\Post::where('type', 3)
                ->orderBy('title')
                ->get();
            ?>
            <div class="comment_box">
                <div class="cmt_title">Bình luận</div>
                <div class="comment_input">
                    @if ($check)
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
                        <article class="comment_item">
                            <a href="{{ route('user_detail', ['id' => $comment->author_id]) }}" class="cmt_info">
                                <img class="cmt_info_img" src="{{ asset($comment->author_avata) }}">
                                <div class="cmt_info_name"> {{ $comment->author_name }} </div>
                                <div class="cmt_info_date"> {{ $comment->created_at }} </div>
                            </a>
                            <div class="cmt_content">
                                <p class="cmt_content_text">
                                    {{ $comment->message }}
                                </p>
                                <i class="fa-solid fa-ellipsis cmt_content_action"></i>
                            </div>
                            <div class="cmt_action_box">
                                @if ($check && ($user->id == $comment->user_id || $user->id == 1))
                                    <button action="edit" uid="{{ $user->id }}" tid="{{ $post->id }}"
                                        cid="{{ $comment->id }}">Sửa</button>
                                    <button action="del" uid="{{ $user->id }}" tid="{{ $post->id }}"
                                        cid="{{ $comment->id }}">Xóa</button>
                                @endif
                                <button action="report">Báo cáo</button>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            @if ($api_posts->count() > 0 && intval($post->type) == 3)
                <div class="api_list_title">Một số API khác</div>
                <div class="home_post">
                    @foreach ($api_posts as $api_post)
                        <article class="home_post_item">
                            <a class="home_post_content" href="{{ route('post.detail', ['slug' => $api_post->slug]) }}">
                                <img class="home_post_img" src="{{ asset($api_post->image) }}">
                                <div class="home_post_img_cover">
                                    <button class="home_post_btn_show">Xem thêm</button>
                                </div>
                                <div class="home_post_view"><i class="fa-solid fa-eye"></i>{{ $api_post->view }} lượt
                                    xem
                                </div>
                                <p class="home_post_item_title">{{ $api_post->title }}</p>
                            </a>
                        </article>
                    @endforeach
                </div>
            @endif

            @if ($posts_related->count() > 0)
                <div class="api_list_title">Một số bài viết liên quan</div>
                <div class="post_list">
                    @foreach ($posts_related as $related_post)
                        <article class="post_list_item">
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
                                        <a href="{{ route('search', $category->title) }}"
                                            class="post_info_category_item">
                                            {{ $category->title }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a class="post_list_item_img"
                                href="{{ route('post.detail', ['slug' => $related_post->slug]) }}"><img
                                    src="{{ asset($related_post->image) }}"></a>
                        </article>
                    @endforeach
                </div>
            @endif
            <aside class="banner_box" style="margin-top: 30px">
                <div class="banner_text">1000+ free template</div>
                <div class="banner_text_item_list">
                    @foreach ($template_banner as $template_banner_item)
                        <article class="banner_text_item">
                            <a href="{{ route('template.list', $template_banner_item->url) }}">
                                {!! $template_banner_item->show !!}
                                <h4 class="banner_text_item_title"> {{ $template_banner_item->title }} </h5>
                            </a>
                        </article>
                    @endforeach
                </div>
            </aside>
        </main>
        <div class="post_box_other">
            <div class="post_box_other_fixed" style="">
                <div class="post_info_author">
                    <img class="post_author_info_img" src="{{ asset($author->avata) }}">
                    <a href="{{ route('user_detail', ['id' => $author->id]) }}" class="post_author_info_name">
                        {{ $author->last_name . ' ' . $author->first_name }} </a>
                    <button class="post_author_btn_follow">Theo dõi</button>
                </div>
                @if ($post_detail->count() > 1)
                    <div class="catalogue">
                        <div class="catalogue_title">Mục lục</div>
                        <div class="catalogue_content">
                            <?php
                            $catalogue_item_index = 3;
                            ?>
                            @foreach ($post_detail as $catalogue_item)
                                <div class="catalogue_item_title" index="{{ ++$catalogue_item_index }}">
                                    {{ $catalogue_item->title }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif
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
                <?php
                $course_list = \App\Models\PLanguage::all();
                $i = 0;
                ?>
                @foreach ($course_list as $course_item)
                    <article class="other_course_item">
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
                    </article>
                @endforeach
                {{-- <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@devsnevn" data-unique-id="devsnevn"
                    data-embed-type="creator" style="width: fit-content; max-width: 300px">
                    <section> <a target="_blank" href="https://www.tiktok.com/@devsnevn?refer=creator_embed">@devsnevn</a>
                    </section>
                </blockquote>
                <script async src="https://www.tiktok.com/embed.js"></script> --}}
            </div>
        </div>
    </div>
    <script src="{{ asset(mix('js/post.js')) }}"></script>
@endsection
