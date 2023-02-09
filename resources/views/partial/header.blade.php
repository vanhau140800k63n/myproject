<div class="header-box">
    <div class="logo"><a href="{{ route('home') }}"><img class="logo_image" src="{{ asset(mix('image/logo1.png')) }}"></a>
    </div>
    {{-- <div class="menu">
        <div class="menu-category active"> Học tập
            <div class="menu-items">
                <div class="menu-item"> SQL </div>
                <div class="menu-item"> Java </div>
                <div class="menu-item"> Python </div>
                <div class="menu-item"> PHP </div>
                <div class="menu-item"> HTML </div>
            </div>
        </div>
        <div class="menu-category"> Tài liệu
            <div class="menu-items">
                <div class="menu-item"> Tín hiệu </div>
                <div class="menu-item"> Lập trình mạng </div>
                <div class="menu-item"> Pacman Project </div>
                <div class="menu-item"> Web Project </div>
                <div class="menu-item"> HTML </div>
            </div>
        </div>
        <div class="menu-category"> Blog
            <div class="menu-items">
                <div class="menu-item"> Tín hiệu </div>
                <div class="menu-item"> Lập trình mạng </div>
                <div class="menu-item"> Pacman Project </div>
                <div class="menu-item"> Web Project </div>
                <div class="menu-item"> HTML </div>
            </div>
        </div>
    </div> --}}
    <div class="search">
        <form class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" placeholder=" " />
            <button type="reset"></button>
        </form>
    </div>
    <div class="header-user">
        @if (!\Illuminate\Support\Facades\Auth::check())
            <a class="login" href="{{ route('login') }}"> Đăng nhập </a>
        @else
            <div class="user_info_box">
                <?php
                $user = \Illuminate\Support\Facades\Auth::user();
                ?>
                <a href="{{ route('user.info', ['id' => $user->id]) }}">
                    <img class="login_img" src="{{ isset($user->avata) ? $user->avata : asset('img/no_avata.jpg') }}">
                </a>
            </div>
        @endif
    </div>
</div>
<script src="{{ asset(mix('js/assets/header.js')) }}"></script>
