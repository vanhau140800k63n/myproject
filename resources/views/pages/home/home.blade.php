@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, cpp, html, css, javascript, Khóa học Lập trình Miễn phí, Khóa học Lập trình Với Giá 0, Khóa học Lập trình Trực tuyến,Học Lập trình Miễn phí,Học Lập trình Trực tuyến,Lập trình Khóa học Miễn phí,Lập trình Khóa học Trực tuyến,Khóa học Lập trình Online,Học Lập trình Online,Lập trình Khóa học Online,Lập trình Khóa học Miễn phí Trực tuyến,Khóa học Lập trình Dành cho Người mới,Học Lập trình Miễn phí Trực tuyến,Học Lập trình Trực tuyến Online,Khóa học Lập trình Trực tuyến Miễn phí">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://devsne.vn/">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Khóa học lập trình miễn phí - DEVSNE.VN">
    <meta property="og:description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta property="og:url" content="https://devsne.vn/">
    <meta property="og:site_name" content="DEVSNE.VN">
    <meta property="article:publisher" content="https://www.facebook.com/devsne.official">
    <meta property="og:image" content="">

    <link href="{{ asset(mix('home_lib/circle-website.min.css')) }}" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        try {
            Typekit.load();
        } catch (e) {}
    </script>
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js')) }}", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
    <link href="{{ asset(mix('home_lib/main.css')) }}" rel="stylesheet" type="text/css">
@endsection
@section('head')
    <title>Trang chủ - Khóa học lập trình miễn phí</title>
@endsection
@section('content')
    <div class="page-wrap">
        <div class="w-embed">
        </div>
        <div data-w-id="e3829c7a-29b8-d59d-e2ec-45a0409f0b5f" class="main">
            <div class="section-slides">
                <div class="section-slide mod--4"
                    style="will-change: transform; transform: translate3d(0px, -1300px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <section id="hero" class="section mod--hero">
                        <div data-w-id="10480d2d-9260-8918-2c74-40211617822a" style="opacity: 1;" class="content mod--hero">
                            <div class="home__content">
                                <div class="wrap-hide">
                                    <h1 class="hero__heading mod--1"
                                        style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        Trang bị <br></h1>
                                </div>
                                <div class="wrap-hide">
                                    <h1 style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                        class="hero__heading">Kiến thức lập trình</h1>
                                </div>
                                <div class="wrap-hide">
                                    <p data-w-id="631697bc-a7d4-4d9b-4421-9e54447c68df"
                                        style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                        class="subheading mod--hero">Với các khóa học lập trình miễn phí <br>
                                        HTML, PHP, Javascript, Python, C++, Java</p>
                                </div>

                                <div style="display: flex">
                                    <div data-w-id="a8616800-07f8-0697-9681-2671b00ca6a7"
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                        class="hero__btn-wrap start_now">
                                        <div data-remodal-target="form" class="btn mod--hero w-inline-block">
                                            <div class="btn__bg-wrap">
                                                <div class="btn__bg"
                                                    style="transform: translate3d(0px, 0px, 0px) scale3d(0, 0, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                                </div>
                                            </div>
                                            <div class="btn__txt">Bắt đầu ngay</div>
                                        </div>
                                    </div>

                                    <a href="{{ route('template.list', 'animation') }}"
                                        data-w-id="a8616800-07f8-0697-9681-2671b00ca6a7"
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; margin-left: 30px"
                                        class="hero__btn-wrap">
                                        <div data-remodal-target="form" class="btn mod--hero w-inline-block">
                                            <div class="btn__bg-wrap"
                                                style="background-color: #8BC6EC;
                                            background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
                                            ">
                                                <div class="btn__bg"
                                                    style="transform: translate3d(0px, 0px, 0px) scale3d(0, 0, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                                </div>
                                            </div>
                                            <div class="btn__txt">1000+ Free Template</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div data-w-id="b9bc89e3-fe08-d373-2233-6ff7b6612753" class="hero_illustr-wrap"
                                style="opacity: 1;">

                            </div>
                            <div data-w-id="f1758663-d3c7-8949-e890-98a710bc9ba4"
                                style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                class="hero__counts">
                                <div data-swiper="numb" class="swiper mod--numb">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide mod--numb">
                                            <div class="hero__numb-block">
                                                <div class="hero__counts-img-wrap"><img
                                                        src="{{ asset(mix('home_lib/61e5adc434c4cc7fcbb10af6_hero_numb-01.svg')) }}"
                                                        loading="eager"
                                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                        alt="" class="hero__counts-img">
                                                    <div class="hero__counts-numb">Python</div>
                                                </div>
                                                <div class="wrap-hide">
                                                    <p style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                        class="hero__counts-p">Phát triển web, xử lý dữ liệu, machine
                                                        learning, game, đồ họa, ...
                                                    </p>
                                                </div>
                                            </div>
                                            <div style="width: 2px;" class="hero__counts-dash"></div>
                                        </div>
                                        <div class="swiper-slide mod--numb">
                                            <div class="hero__numb-block">
                                                <div class="hero__counts-img-wrap"><img
                                                        src="{{ asset(mix('home_lib/61e5adc434c4cc7fcbb10af6_hero_numb-01.svg')) }}"
                                                        loading="eager"
                                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                        alt="" class="hero__counts-img">
                                                    <div class="hero__counts-numb">Java</div>
                                                </div>
                                                <div class="wrap-hide">
                                                    <p style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                        class="hero__counts-p">Phát triển các ứng dụng web, mobile,
                                                        desktop, game, cơ sở dữ liệu, ...
                                                    </p>
                                                </div>
                                            </div>
                                            <div style="width: 2px;" class="hero__counts-dash"></div>
                                        </div>
                                        <div class="swiper-slide mod--numb">
                                            <div class="hero__numb-block">
                                                <div class="hero__counts-img-wrap"><img
                                                        src="{{ asset(mix('home_lib/61e5adc434c4cc7fcbb10af6_hero_numb-01.svg')) }}"
                                                        loading="eager"
                                                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                        alt="" class="hero__counts-img">
                                                    <div class="hero__counts-numb">C++</div>
                                                </div>
                                                <div class="wrap-hide">
                                                    <p style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                        class="hero__counts-p">Phát triển Web, game, đồ họa, Robotics, viết
                                                        ứng dụng hệ thống và phần cứng, ...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-swiper="pagin-numb" class="swiper-pagination-bullets mod--numbs">
                                    <div class="swiper-pagination-bullet swiper-pagination-bullet-active"></div>
                                    <div class="swiper-pagination-bullet"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="section-slide mod--3"
                    style="will-change: transform; transform: translate3d(0px, -54.14vh, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <section id="program" class="section mod--steps">
                        <div data-w-id="ed551191-b1ef-9624-abde-e6e2dd90bea2" class="content">
                            <div class="steps__columns">
                                <div class="steps__col">
                                    <div class="steps__illustr-wrap"><img
                                            src="{{ asset(mix('home_lib/61e945a0392884655da8bf78_step_illustr.svg')) }}"
                                            loading="lazy" alt="" class="steps__illustr">
                                        <div class="steps__illustr-graph-wrap">
                                            <div class="steps__illustr-graph-dot mod--1">
                                                <div data-w-id="b4d502a7-124e-939d-5dd4-2b4bdb8a48a4"
                                                    class="steps__illustr-graph-line"
                                                    style="will-change: width, height; height: 50px;"></div>
                                            </div>
                                            <div class="steps__illustr-graph-dot mod--2">
                                                <div data-w-id="917b7fbc-0027-301a-958b-83c08657ca66"
                                                    class="steps__illustr-graph-line mod--2"
                                                    style="will-change: width, height; height: 40px;"></div>
                                            </div>
                                            <div class="steps__illustr-graph-dot mod--3">
                                                <div data-w-id="05fa4d3f-3078-ad2c-4504-5f24ec65670e"
                                                    class="steps__illustr-graph-line"
                                                    style="will-change: width, height; height: 50px;"></div>
                                            </div>
                                            <div class="steps__illustr-graph-dot mod--4"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="steps__col mod--2"
                                    style="will-change: transform; transform: translate3d(0px, -10%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                    <h2 style="font-weight: 700">Lập trình Game</h2>
                                    <ul role="list" class="steps__list">
                                        <li class="steps__list-item">
                                            <div class="steps__numb"><img
                                                    src="{{ asset(mix('home_lib/61e5adc3a63df4d6d29874c6_step_numb-01.svg')) }}"
                                                    loading="lazy"
                                                    style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                    alt="" class="steps__numb-img">
                                                <div class="steps__numb-txt">01</div>
                                            </div>
                                            <h3 class="steps__list-title">Đồ họa và thiết kế</h3>
                                            <p class="steps__list-p">Đồ họa và thiết kế tạo ra trải nghiệm hấp dẫn cho
                                                người chơi. Không
                                                chỉ cần có đồ họa đẹp mắt, mà còn phải có sự phối hợp hài hòa giữa màu sắc,
                                                âm thanh và các hiệu ứng để tạo ra một thế giới sống động.</p>
                                            <div style="width: 74px;" class="steps__list-arrow-wrap"><img
                                                    src="{{ asset(mix('home_lib/61e5adc40ddc66aafb697c3d_steps_arrow.svg')) }}"
                                                    loading="lazy" alt="" class="steps__list-arrow"></div>
                                        </li>
                                        <li class="steps__list-item mod--2">
                                            <div class="steps__numb"><img
                                                    src="{{ asset(mix('home_lib/61e5adc4fe559a0c2a5d0194_step_numb-02.svg')) }}"
                                                    loading="lazy"
                                                    style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                    alt="" class="steps__numb-img">
                                                <div class="steps__numb-txt">02</div>
                                            </div>
                                            <h3 class="steps__list-title">Lập trình đa nền tảng</h3>
                                            <p class="steps__list-p">Game có thể chạy được trên nhiều hệ điều hành
                                                khác nhau như iOS, Android, Windows, Xbox hoặc PlayStation.</p>
                                            <div class="steps__list-arrow-wrap mod--2" style="width: 74px;"><img
                                                    src="{{ asset(mix('home_lib/61e5adc40ddc66aafb697c3d_steps_arrow.svg')) }}"
                                                    loading="lazy" alt="" class="steps__list-arrow"></div>
                                        </li>
                                        <li class="steps__list-item">
                                            <div class="steps__numb"><img
                                                    src="{{ asset(mix('home_lib/61e5adc40d93828403cac728_step_numb-03.svg')) }}"
                                                    loading="lazy"
                                                    style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                                    alt="" class="steps__numb-img">
                                                <div class="steps__numb-txt">03</div>
                                            </div>
                                            <h3 class="steps__list-title">Tối ưu hóa và kiểm thử</h3>
                                            <p class="steps__list-p">Tối ưu hóa bao gồm
                                                tối ưu hóa nguồn tài nguyên, độ trễ và tốc độ khung hình</p>
                                            <div class="steps__list-arrow-wrap mod--3" style="width: 148px;"><img
                                                    src="{{ asset(mix('home_lib/61e5adc4fe559a406b5d0195_steps_arrow-plane.svg')) }}"
                                                    loading="lazy" alt="" class="steps__list-arrow"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="section-slide mod--2"
                    style="will-change: transform; transform: translate3d(0px, 0vh, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <section id="courses" class="section mod--courses">
                        <div data-w-id="59f15cc6-f7f7-b018-eeee-392bf2018627" class="content">
                            <div class="courses__heading-wrap">
                                <div class="wrap-hide">
                                    <h2 data-w-id="59f15cc6-f7f7-b018-eeee-392bf2018629" class="heading--margin-0"
                                        style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; font-weight: 700">
                                        Framework<br>PHP, Javascript</h2>
                                </div>
                                <div class="wrap-hide">

                                </div>
                            </div>
                            <div class="courses__columns">
                                <div data-w-id="2b16fb48-bb5c-e726-3d57-7990df9c0828" class="courses__col"
                                    style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                    <div data-remodal-target="form" class="courses__block">
                                        <div class="courses__txt-wrap">
                                            <div class="courses__type">Laravel</div>
                                            <h3 class="courses__title"> Là Framework PHP cung cấp nhiều đặc tính tiện ích
                                                và giúp đơn giản hóa việc
                                                phát triển các ứng dụng phức tạp.
                                            </h3>
                                        </div><a href="{{ route('learn.lesson_intro', ['course' => 'laravel']) }}"
                                            class="courses__more">Học ngay</a>
                                        <div class="courses__illustr-wrap"><img
                                                src="{{ asset(mix('home_lib/61e95527a42b3b2259997ca9_courses_illustr-clock.svg')) }}"
                                                loading="lazy" alt="" class="courses__illustr">
                                            <div class="courses__illustr-elem mod--5"></div>
                                            <div class="courses__illustr-elem-wrap mod--4">
                                                <div class="courses__illustr-elem mod--dot"></div>
                                            </div>
                                            <div class="courses__illustr-elem-wrap mod--3">
                                                <div class="courses__illustr-elem mod--ball"></div>
                                            </div>
                                            <div class="courses__illustr-elem-wrap mod--2"><img
                                                    src="{{ asset(mix('home_lib/61e9511e81a5bc80f781f7e0_courses_illustr-blue.svg')) }}"
                                                    loading="lazy" alt=""
                                                    class="courses__illustr-elem mod--blue"></div>
                                            <div class="courses__illustr-elem-wrap mod--1">
                                                <div class="courses__illustr-elem mod--circle"></div>
                                            </div>
                                        </div>
                                        <div class="courses__block-bg" style="width: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                                <div data-w-id="c0e85876-2a84-f305-67c3-430b0a1306e1" class="courses__col"
                                    style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                    <div data-remodal-target="form" class="courses__block">
                                        <div class="courses__txt-wrap">
                                            <div class="courses__type">ReactJS</div>
                                            <h3 class="courses__title">Là Framework JavaScript mã nguồn mở được sử dụng để
                                                xây dựng các giao diện người dùng.</h3>
                                        </div><a href="{{ route('learn.lesson_intro', ['course' => 'reactjs']) }}"
                                            class="courses__more">Học ngay</a>
                                        <div class="courses__illustr-wrap"><img
                                                src="{{ asset(mix('home_lib/61e957020b93d471c75bfa1a_courses_illustr-screen2.svg')) }}"
                                                loading="lazy" alt="" class="courses__illustr mod--2"><img
                                                src="{{ asset(mix('home_lib/61e957034930d9d86715d18b_courses_illustr-screen.svg')) }}"
                                                loading="lazy" alt="" class="courses__illustr">
                                            <div class="courses__illustr-elem-wrap mod--4 mod--screen">
                                                <div class="courses__illustr-elem mod--circle"></div>
                                            </div>
                                            <div class="courses__illustr-elem-wrap mod--3 mod--screen">
                                                <div class="courses__illustr-elem mod--ball mod--screen"></div>
                                            </div>
                                            <div class="courses__illustr-elem-wrap mod--2 mod--screen">
                                                <div class="courses__illustr-elem mod--dot mod--screen"></div>
                                            </div>
                                            <div class="courses__illustr-elem-wrap mod--1 mod--screen"><img
                                                    src="{{ asset(mix('home_lib/61e9511e81a5bc80f781f7e0_courses_illustr-blue.svg')) }}"
                                                    loading="lazy" alt=""
                                                    class="courses__illustr-elem mod--blue mod--screen"></div>
                                        </div>
                                        <div class="courses__block-bg" style=""></div>
                                    </div>
                                </div>
                                <div class="courses__col mod--3"
                                    style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                    <div data-remodal-target="form" class="courses__block">
                                        <div class="courses__txt-wrap">
                                            <div class="courses__type">VueJS</div>
                                            <h3 class="courses__title">Là Framework JavaScript mã nguồn mở được sử dụng để
                                                xây dựng các giao diện người dùng và các ứng dụng web độc lập.
                                            </h3>
                                        </div><a href="{{ route('learn.lesson_intro', ['course' => 'vuejs']) }}"
                                            class="courses__more">Học ngay</a>
                                        <div class="courses__illustr-wrap"><img
                                                src="{{ asset(mix('home_lib/61e96e8e0177b619671e0411_courses_illustr-graph.svg')) }}"
                                                loading="lazy" alt="" class="courses__illustr"><img
                                                src="{{ asset(mix('home_lib/61e96e8e0293752c9ae8eae6_courses_illustr-graph2.svg')) }}"
                                                loading="lazy" alt="" class="courses__illustr mod--2">
                                            <div class="courses__illustr-elem-wrap mod--4 mod--graph">
                                                <div class="courses__illustr-elem mod--dot mod--graph"></div>
                                            </div>
                                            <div class="courses__illustr-elem-wrap mod--3 mod--graph">
                                                <div class="courses__illustr-elem mod--ball mod--graph"></div>
                                            </div>
                                            <div class="courses__illustr-elem-wrap mod--2 mod--graph">
                                                <div class="courses__illustr-elem mod--circle mod--graph"></div>
                                            </div>
                                            <div class="courses__illustr-elem-wrap mod--1 mod--screen"><img
                                                    src="{{ asset(mix('home_lib/61e9511e81a5bc80f781f7e0_courses_illustr-blue.svg')) }}"
                                                    loading="lazy" alt=""
                                                    class="courses__illustr-elem mod--blue mod--screen"></div>
                                        </div>
                                        <div class="courses__block-bg" style="width: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="section-slide mod--1"
                    style="will-change: transform; transform: translate3d(0px, 0vh, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <section id="reviews" class="section mod--reviews">
                        <div data-w-id="45113257-d841-df6c-5982-f2b5d696bb96" class="content">
                            <h2 data-w-id="45113257-d841-df6c-5982-f2b5d696bb9b" class="heading--center"
                                style="opacity: 0; transform: translate3d(0px, 50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; font-weight: 700">
                                Đánh giá khóa học</h2>
                            <div data-swiper="reviews" class="swiper swiper--reviews">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide mod--reviews">
                                        <div class="reviews__block">
                                            <div data-w-id="b1aba590-6da4-7582-aa6a-37309ea3bcdc"
                                                class="reviews__ava-wrap"
                                                style="transform: translate3d(0px, 0px, 0px) scale3d(0.7, 0.7, 1) rotateX(0deg) rotateY(0deg) rotateZ(-10deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 0;">
                                                <img src="" loading="lazy" width="123.5" alt=""
                                                    class="reviews__ava"><img
                                                    src="{{ asset(mix('home_lib/61f1243b04b9643a7746ea4c_spot.svg')) }}"
                                                    loading="lazy" alt="" class="reviews__ava-spot mod--1">
                                                <div class="reviews__ava-dot mod--1"></div>
                                                <div class="reviews__ava-circle mod--1"></div>
                                            </div>
                                            <div class="wrap-hide">
                                                <h3 data-w-id="97b716b0-1c96-8fcb-71e7-362803c34f5c"
                                                    class="reviews__title"
                                                    style="transform: translate3d(0px, -100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                                    Bài tập thực hành</h3>
                                            </div>
                                            <div class="wrap-hide">
                                                <p data-w-id="c97e8ba7-e028-c47a-47d8-058230c087d3" class="reviews__p"
                                                    style="transform: translate3d(0px, -100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                                    Khóa học lập trình trực tuyến sẽ cung cấp cho học viên nhiều bài tập
                                                    thực hành để giúp họ áp dụng kiến thức được học vào thực tế.</p>
                                            </div>
                                        </div>
                                        <div data-w-id="96fe40c1-1dc8-b204-a700-5616474391fc" class="reviews__dash"
                                            style="height: 0px;">
                                        </div>
                                    </div>
                                    <div class="swiper-slide mod--reviews">
                                        <div class="reviews__block">
                                            <div data-w-id="98053f3f-402c-a915-c120-e2115c35d951"
                                                class="reviews__ava-wrap"
                                                style="transform: translate3d(0px, 0px, 0px) scale3d(0.7, 0.7, 1) rotateX(0deg) rotateY(0deg) rotateZ(-10deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 0;">
                                                <img src="" loading="lazy" width="123" alt=""
                                                    class="reviews__ava"><img
                                                    src="{{ asset(mix('home_lib/61f1243b04b9643a7746ea4c_spot.svg')) }}"
                                                    loading="lazy" alt="" class="reviews__ava-spot mod--2">
                                                <div class="reviews__ava-dot mod--2"></div>
                                                <div class="reviews__ava-circle mod--2"></div>
                                            </div>
                                            <div class="wrap-hide">
                                                <h3 data-w-id="804f1866-1e41-a54a-1285-a742d0257ffc"
                                                    class="reviews__title"
                                                    style="transform: translate3d(0px, -100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                                    Ví dụ minh họa</h3>
                                            </div>
                                            <div class="wrap-hide">
                                                <p data-w-id="804f1866-1e41-a54a-1285-a742d0257ffe" class="reviews__p"
                                                    style="transform: translate3d(0px, -100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                                    Khóa học lập trình trực tuyến sẽ cung cấp cho học viên nhiều ví dụ minh
                                                    họa để họ có thể hiểu rõ hơn cách áp dụng kiến thức vào thực tế.</p>
                                            </div>
                                        </div>
                                        <div data-w-id="804f1866-1e41-a54a-1285-a742d0258000" class="reviews__dash"
                                            style="height: 0px;">
                                        </div>
                                    </div>
                                    <div class="swiper-slide mod--reviews">
                                        <div class="reviews__block">
                                            <div data-w-id="ac92c6d4-b63f-868e-4e4f-1913ee8aad1c"
                                                class="reviews__ava-wrap"
                                                style="transform: translate3d(0px, 0px, 0px) scale3d(0.7, 0.7, 1) rotateX(0deg) rotateY(0deg) rotateZ(-10deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 0;">
                                                <img src="" loading="lazy" width="125" alt=""
                                                    class="reviews__ava"><img
                                                    src="{{ asset(mix('home_lib/61f1243b04b9643a7746ea4c_spot.svg')) }}"
                                                    loading="lazy" alt="" class="reviews__ava-spot mod--3">
                                                <div class="reviews__ava-dot mod--3"></div>
                                                <div class="reviews__ava-circle mod--3"></div>
                                            </div>
                                            <div class="wrap-hide">
                                                <h3 data-w-id="a856a692-fdfd-94c9-d172-b93c8cbf81c9"
                                                    class="reviews__title"
                                                    style="transform: translate3d(0px, -100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                                    Thông tin cập nhật</h3>
                                            </div>
                                            <div class="wrap-hide">
                                                <p data-w-id="a856a692-fdfd-94c9-d172-b93c8cbf81cb" class="reviews__p"
                                                    style="transform: translate3d(0px, -100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                                    Khóa học lập trình trực tuyến sẽ cập nhật các kiến thức, công nghệ mới
                                                    nhất để giúp học viên cập nhật kiến thức và thực hành thành công hơn.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper__nav mod--reviews">
                                <div data-swiper="prev-reviews" class="swiper__arrow arrow--prev">
                                    <div class="swiper__arrow-ico"></div>
                                </div>
                                <div data-swiper="next-reviews" class="swiper__arrow arrow--next">
                                    <div class="swiper__arrow-ico"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            let interval;

            function goInterval() {
                interval = setInterval(function() {
                    let zIndex = $('.section.mod--header').css("z-index");
                    if (zIndex == 90) {
                        $('.section.mod--header').css("z-index", '91');
                    } else {
                        $('.section.mod--header').css("z-index", '90');
                    }
                }, 100);
            }

            function stopInterval() {
                clearInterval(interval);
            }

            let work4 = work3 = work2 = work1 = true;
            $(window).scroll(function() {
                let offset4 = $(".section-slide.mod--4")[0].getBoundingClientRect();
                let perc4 = Math.round((offset4.bottom - offset4.height) / offset4.height * 100);

                if (perc4 <= -70 && work4 == true) {
                    work4 = false;
                    stopInterval();
                    $(".section-slide.mod--3").find('.content').click();
                } else if (perc4 >= -70 && work4 == false) {
                    work4 = true;
                    goInterval();
                }

                let offset3 = $(".section-slide.mod--3")[0].getBoundingClientRect();
                let perc3 = Math.round((offset3.bottom - offset3.height) / offset3.height * 100);

                if (perc3 <= -40 && work3 == true) {
                    work3 = false;
                    $(".section-slide.mod--2").find('.content').click();
                }

                let offset2 = $(".section-slide.mod--2")[0].getBoundingClientRect();
                let perc2 = Math.round((offset2.bottom - offset2.height) / offset2.height * 100);

                if (perc2 <= -40 && work2 == true) {
                    work2 = false;
                    $(".section-slide.mod--1").find('.content').click();
                }

                let offset1 = $(".section-slide.mod--1")[0].getBoundingClientRect();
                let perc1 = Math.round((offset1.bottom - offset1.height) / offset1.height * 100);

                if (perc1 <= -40 && work1 == true) {
                    work1 = false;
                    $(".section-slide.mod--0").find('.content').click();
                }

            });


            $('.header__nav-link').click(function() {
                let target = $(this).attr('href');
                let section = $(`${target}`).parents('.section-slide');
                let indexSection = $('.section-slide').index(section);
                indexSection = indexSection * $(window).height();
                $(window).scrollTop(indexSection);
                $(section).find('.content').click();
            });
            $('.footer__nav-link').click(function() {
                let target = $(this).attr('href');
                let section = $(`${target}`).parents('.section-slide');
                let indexSection = $('.section-slide').index(section) + 1;
                indexSection = indexSection * $(window).height();
                $(window).scrollTop(indexSection);
                if (section == 0) {
                    goInterval();
                }
                $(section).find('.content').click();
            });
        });
    </script>
    <div class="box">
        <div class="home_lesson">
            @foreach ($p_languages as $p_language)
                <div class="home_lesson_item">
                    <input id="input_{{ $p_language->name }}" value="{{ $p_language->home_content }}"
                        color="{{ $p_language->color }}" hidden>
                    <div class="home_lesson_card" id="{{ $p_language->name }}"></div>
                    <a href="{{ route('learn.lesson_intro', ['course' => $p_language->name]) }}">
                        <div class="home_lesson_cover"></div>
                    </a>
                    <a class="home_lesson_info"
                        href="{{ route('learn.lesson_intro', ['course' => $p_language->name]) }}">
                        Học {{ $p_language->full_name }} miễn phí
                    </a>
                </div>
            @endforeach
        </div>
        <div class="home_post">
            @foreach ($post_list as $post)
                <div class="home_post_item">
                    <a class="home_post_content" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
                        <img class="home_post_img" src="{{ $post->image }}">
                        <div class="home_post_img_cover">
                            <button class="home_post_btn_show">Xem thêm</button>
                        </div>
                        <div class="home_post_view"><i class="fa-solid fa-eye"></i>{{ $post->view }} lượt xem</div>
                        <p class="home_post_item_title">{{ $post->title }}</p>
                    </a>
                    <div class="home_post_author">
                        <a href="{{ route('user_detail', ['id' => $post->author_id]) }}" style="display: flex">
                            <img class="home_post_author_img" src="{{ $post->author_avata }}">
                            <div class="home_post_author_name"> {{ $post->author_name }}</div>
                        </a>
                        <div class="home_post_action">
                            <?php
                            $save_action = '';
                            $like_action = '';
                            if (\Illuminate\Support\Facades\Auth::check()) {
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
                            }
                            ?>
                            <i action="3" post_id="{{ $post->id }}"
                                class="fa-solid fa-bookmark {{ $save_action }}"></i>
                            <i action="4" post_id="{{ $post->id }}"
                                class="fa-solid fa-heart {{ $like_action }}"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="home_lesson" style="margin-top: 150px">
            @foreach ($p_languages as $p_language)
                <div class="home_solution_item"
                    style="background-image: url('https://www.transparenttextures.com/patterns/black-thread-light.png'), {{ $p_language->color }}">
                    Một số bài toán <br> {{ $p_language->full_name }}
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset(mix('home_lib/webflow.js')) }}" type="text/javascript"></script>
    <script src="{{ asset(mix('js/code-mirror.js')) }}"></script>
@endsection
