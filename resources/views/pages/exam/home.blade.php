@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <title>Luyện thi | DEVSNE</title>
@endsection
@section('content')
    <main id="layout-main" class="home">
        <div class="wrap-home-content">
            <section class="wrap-block-user home-section">
                <div class="container">
                    <div class="wrap-main-user-profile row">
                        <div class="wrap-main-user-profile-box">
                            @if ($user != null)
                                <div class="main-user-info">
                                    <div class="header-main-user-info">
                                        <div class="user-avatar">
                                            <img alt="User Avata" class="level-avatar" src="{{ asset($user->avata) }}">
                                        </div>
                                        <div class="content-main-user-info">
                                            <h3 class="user-name">{{ $user->email }}</h3>
                                            <p class="main-user-des">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="detail-progress-item">
                                            <h4>Khoá học</h4>
                                            <div class="detail-progress-content">
                                                <span class="result">0/19</span>
                                            </div>
                                            <div class="item-progress-bar">
                                                <span class="current-progress" style="width: 0%;"></span>
                                            </div>
                                        </div>
                                        <div class="detail-progress-item">
                                            <h4>Luyện tập</h4>
                                            <div class="detail-progress-content">
                                                <span class="result">0/1625</span>
                                            </div>
                                            <div class="item-progress-bar">
                                                <span class="current-progress" style="width:0%;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="main-user-info">
                                    <div class="header-main-user-info">
                                        <div class="user-avatar">
                                            <img alt="User Avata" class="level-avatar" src="{{ asset('img/no_avata.jpg') }}">
                                        </div>
                                        <div class="content-main-user-info">
                                            <a class="user-name" href="{{ route('login') }}">Đăng nhập ?</a>
                                            <p class="main-user-des">
                                                Tham gia ngay để nhận được những phần thưởng hấp dẫn
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="detail-progress-item">
                                            <h4>Khoá học</h4>
                                            <div class="detail-progress-content">
                                                <span class="result">0/19</span>
                                            </div>
                                            <div class="item-progress-bar">
                                                <span class="current-progress" style="width: 0%;"></span>
                                            </div>
                                        </div>
                                        <div class="detail-progress-item">
                                            <h4>Luyện tập</h4>
                                            <div class="detail-progress-content">
                                                <span class="result">0/1625</span>
                                            </div>
                                            <div class="item-progress-bar">
                                                <span class="current-progress" style="width:0%;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="wrap-main-user-profile-other">
                            <div class="wrap-exam-banner">
                                <ul class="team">
                                    <li class="member co-funder" style="--banner-color: #b8c6fb">
                                        <div class="thumb"><img
                                                src="https://st2.depositphotos.com/47577860/46970/v/600/depositphotos_469705934-stock-illustration-coding-computer-language-icon.jpg">
                                        </div>
                                        <div class="description">
                                            <h3>Daily Challenge</h3>
                                            <p>Cùng 1 bài toán lập trình nhưng có thể có nhiều lời giải. Độ phức tạp của
                                                thuật toán trong các lời giải có thể khác nhau và tùy vào dữ liệu. Bạn hãy
                                                tìm ra lời giải tối ưu nhất.<br><a href="">Tham Gia</a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="member co-funder" style="--banner-color: #e8f6fe">
                                        <div class="thumb"><img
                                                src="https://st2.depositphotos.com/47577860/46970/v/600/depositphotos_469705934-stock-illustration-coding-computer-language-icon.jpg">
                                        </div>
                                        <div class="description">
                                            <h3>Weekly Challenge</h3>
                                            <p>Cùng 1 bài toán lập trình nhưng có thể có nhiều lời giải. Độ phức tạp của
                                                thuật toán trong các lời giải có thể khác nhau và tùy vào dữ liệu. Bạn hãy
                                                tìm ra lời giải tối ưu nhất.<br><a href="">Tham Gia</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="learning-path">
                <ul>
                    <li style="--accent-color:#60c5a6">
                        <div class="icon"><i class="fa-brands fa-java"></i></div>
                        <div class="title">Java</div>
                        {{-- <div class="descr">Xem thêm</div> --}}
                    </li>
                    <li style="--accent-color:#324985">
                        <div class="icon"><i class="fa-brands fa-html5"></i></div>
                        <div class="title">HTML 5</div>
                        {{-- <div class="descr">Xem thêm</div> --}}
                    </li>
                    <li style="--accent-color:#FCBA35">
                        <div class="icon"><i class="fa-brands fa-css3"></i></div>
                        <div class="title">CSS 3</div>
                        {{-- <div class="descr">Xem thêm</div> --}}
                    </li>
                    <li style="--accent-color:#DAE438">
                        <div class="icon"><i class="fa-brands fa-js"></i></div>
                        <div class="title">Javascript</div>
                        {{-- <div class="descr">Xem thêm</div> --}}
                    </li>
                    <li style="--accent-color:#994D7F">
                        <div class="icon"><i class="fa-brands fa-github"></i></div>
                        <div class="title">Github</div>
                        {{-- <div class="descr">Xem thêm</div> --}}
                    </li>
                </ul>
            </section>
            {{-- <section class="wrap-block-courses home-section">

                <div class="container">
                    <div class="wrap-course-tabs">
                        <div id="suggest-courses" class="cl-tab-item active">
                            <div class="row list-courses">
                                <article class="course-item grid-style">
                                    <a title="C++ nâng cao" href="" class="wrap-course-item">
                                        <div class="course-thumb">
                                            <div class="cl-badge  hot">
                                                <span>Nổi bật</span>
                                            </div>
                                            <img src="" alt="C++ nâng cao">
                                        </div>
                                        <div class="view-content">
                                            <h3 class="course-title">
                                                C++ nâng cao
                                            </h3>
                                            <p>Khóa học lập trình C++ nâng cao sẽ giúp bạn hiểu sâu hơn về
                                                C++ với một số khái niệm như con trỏ, mảng, cấp phát bộ nhớ
                                                động, struct, ...</p>
                                            <div class="course-info">
                                                <span class="lession-count">
                                                    <i class="cl-icon-desktop"></i>32
                                                </span>
                                                <span class="time">
                                                    <i class="cl-icon-clock"></i>20:00:00
                                                </span>
                                                <span class="btn btn-round" title="C++ nâng cao">Học
                                                    ngay</span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                                <article class="course-item grid-style col-xs-12 col-sm-6 col-lg-3">
                                    <a title="Lập trình hướng đối tượng trong C++" href="" class="wrap-course-item">
                                        <div class="course-thumb">
                                            <div class="cl-badge  new">
                                                <span>Khóa mới</span>
                                            </div>
                                            <img src="" alt="Lập trình hướng đối tượng trong C++">
                                        </div>
                                        <div class="view-content">
                                            <h3 class="course-title">
                                                Lập trình hướng đối tượng trong C++
                                            </h3>
                                            <p>Lập trình hướng đối tượng (Object-Oriented-Programming) là
                                                phương pháp lập trình dựa trên đối tượng để tìm ra bản chất
                                                của vấn đề. Khóa học C++ OOP giúp các lập trình viên học
                                                được kỹ thuật lập trình mà tất cả logic, yêu cầu thực tế đều
                                                được xây dựng xoay quanh các đối tượng. Hiểu được cách thức
                                                hoạt động của C++ OOP sẽ làm đơn giản hóa việc bảo trì và dễ
                                                dàng mở rộng trong việc thiết kế phần mềm.</p>
                                            <div class="course-info">
                                                <span class="lession-count">
                                                    <i class="cl-icon-desktop"></i>80
                                                </span>
                                                <span class="time">
                                                    <i class="cl-icon-clock"></i>40:00:00
                                                </span>
                                                <span class="btn btn-round"
                                                    title="Lập trình hướng đối tượng trong C++">Học
                                                    ngay</span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                                <article class="course-item grid-style col-xs-12 col-sm-6 col-lg-3">
                                    <a title="C++ cho người mới bắt đầu" href="" class="wrap-course-item">
                                        <div class="course-thumb">
                                            <div class="cl-badge  hot">
                                                <span>Nổi bật</span>
                                            </div>
                                            <img src="" alt="C++ cho người mới bắt đầu">
                                        </div>
                                        <div class="view-content">
                                            <h3 class="course-title">
                                                C++ cho người mới bắt đầu
                                            </h3>
                                            <p>Khóa học lập trình C++ cơ bản cho người mới bắt đầu. Khóa học
                                                này sẽ cung cấp những kiến thức cơ bản, dễ hiểu nhất về ngôn
                                                ngữ lập trình C++.</p>
                                            <div class="course-info">
                                                <span class="lession-count">
                                                    <i class="cl-icon-desktop"></i>89
                                                </span>
                                                <span class="time">
                                                    <i class="cl-icon-clock"></i>20:00:00
                                                </span>
                                                <span class="btn btn-round" title="C++ cho người mới bắt đầu">Học
                                                    ngay</span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                                <article class="course-item grid-style col-xs-12 col-sm-6 col-lg-3">
                                    <a title="C cho người mới bắt đầu" href="" class="wrap-course-item">
                                        <div class="course-thumb">
                                            <div class="cl-badge  hot new">
                                                <span>Nổi bật</span>
                                            </div>
                                            <img src="" alt="C cho người mới bắt đầu">
                                        </div>
                                        <div class="view-content">
                                            <h3 class="course-title">
                                                C cho người mới bắt đầu
                                            </h3>
                                            <p>Khóa học lập trình C cho người mới bắt đầu. Khóa học này sẽ
                                                cung cấp những kiến thức cơ bản và là nền tảng để bạn đi xa
                                                hơn trên con đường lập trình.</p>
                                            <div class="course-info">
                                                <span class="lession-count">
                                                    <i class="cl-icon-desktop"></i>84
                                                </span>
                                                <span class="time">
                                                    <i class="cl-icon-clock"></i>20:00:00
                                                </span>
                                                <span class="btn btn-round" title="C cho người mới bắt đầu">Học
                                                    ngay</span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                        </div>

                        <div id="recent-courses" class="cl-tab-item">
                            <div class="row list-courses">
                                <article class="course-item grid-style col-xs-12 col-sm-6 col-lg-3">
                                    <a title="Java cơ bản" href=""
                                        class="wrap-course-item">
                                        <div class="course-thumb">
                                            <div class="cl-badge  hot">
                                                <span>Nổi bật</span>
                                            </div>
                                            <img src=""
                                                alt="Java cơ bản">
                                        </div>
                                        <div class="view-content">
                                            <h3 class="course-title">
                                                Java cơ bản
                                            </h3>
                                            <p>Khóa học lập trình Java cơ bản cho người mới bắt đầu, khóa
                                                học này sẽ là nền tảng cho khóa Java nâng cao để tiến tới
                                                Java Web hay lập trình Android, ...</p>
                                            <div class="course-info">
                                                <span class="percent-complete">0%</span>
                                                <span class="lession-count">
                                                    <i class="cl-icon-desktop"></i>83
                                                </span>
                                                <span class="time">
                                                    <i class="cl-icon-clock"></i>26:00:00
                                                </span>
                                                <span class="btn btn-round" title="Java cơ bản">Học
                                                    ngay</span>
                                            </div>
                                        </div>
                                        <div class="cl-progress-bar">
                                            <span style="width:0%"></span>
                                        </div>
                                    </a>
                                </article>
                            </div>
                        </div>

                        <div id="finish-courses" class="cl-tab-item">
                            <div class="row list-courses">
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
        </div>
    </main>
@endsection
