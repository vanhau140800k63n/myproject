@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <meta name="description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, cpp, html, css, javascript, Khóa học Lập trình Miễn phí, Khóa học Lập trình Với Giá 0, Khóa học Lập trình Trực tuyến,Học Lập trình Miễn phí,Học Lập trình Trực tuyến,Lập trình Khóa học Miễn phí,Lập trình Khóa học Trực tuyến,Khóa học Lập trình Online,Học Lập trình Online,Lập trình Khóa học Online,Lập trình Khóa học Miễn phí Trực tuyến,Khóa học Lập trình Dành cho Người mới,Học Lập trình Miễn phí Trực tuyến,Học Lập trình Trực tuyến Online,Khóa học Lập trình Trực tuyến Miễn phí">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <title>{{ $user->last_name . ' ' . $user->first_name }} | DEVSNE</title>
    <link rel="stylesheet" href="{{ asset(mix('css/user_detail.css')) }}">
@endsection
@section('content')
    <div class="main-content">
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
            style="min-height: 450px; background-size: contain; background-position: center top;">
            <span class="mask bg-gradient-default opacity-8"></span>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="{{ asset($user->avata) }}" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-sm btn-info mr-4">Theo dõi</a>
                                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                            <span class="heading">0</span>
                                            <span class="description">Theo dõi</span>
                                        </div>
                                        <div>
                                            <span class="heading">0</span>
                                            <span class="description">Bài viết</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    {{ $user->last_name . ' ' . $user->first_name }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Thông tin tài khoản</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">Hoạt động gần đây</h6>
                                <div class="pl-lg-4">
                                    @foreach ($actions as $action)
                                        <div class="recent_activity">
                                            <p style="color: rgb(150, 150, 148)">
                                                {{ $action->created_at != null ? date_format($action->created_at, 'd/m/Y') : '' }}:&nbsp;&nbsp;
                                            </p>
                                            <p>{{ $action->title }}&nbsp;</p>
                                            <a href="{{ route('post.detail', ['slug' => $action->post_slug]) }}"
                                                style="font-weight: 500; line-height: 1.7; color:#2e6eb4">{{ $action->post_title }}</a>
                                        </div>
                                    @endforeach
                                </div>
                                <hr class="my-4">
                                <h6 class="heading-small text-muted mb-4">Bài viết</h6>
                                <div class="pl-lg-4">
                                </div>
                                <hr class="my-4">
                                <h6 class="heading-small text-muted mb-4">Thành tích</h6>
                                <div class="pl-lg-4">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
