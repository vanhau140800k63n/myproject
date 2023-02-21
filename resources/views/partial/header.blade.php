<div class="header-box">
    <div class="logo"><a href="{{ route('home') }}"><img class="logo_image" src="{{ asset(mix('image/logo1.png')) }}"></a>
    </div>
    <div class="search">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input class="search_input" type="text" placeholder=" " />
            <button type="reset"></button>
        </div>
        <div class="search_result">
            <div class="search_loading">
                <div class="search_loading_title">Tìm kiếm cho:</div>
                <div class="lds-ring">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="search_result_box">

            </div>
        </div>
    </div>
    <div class="header-user">
        @if (!\Illuminate\Support\Facades\Auth::check())
            <a class="login" href="{{ route('login') }}"> Đăng nhập </a>
        @else
            <div class="user_info_box">
                <?php
                $user = \Illuminate\Support\Facades\Auth::user();
                ?>
                <a href="{{ route('user.info') }}">
                    <img class="login_img"
                        src="{{ isset($user->avata) ? asset($user->avata) : asset('img/no_avata.jpg') }}">
                </a>
            </div>
        @endif
    </div>
</div>
<script src="{{ asset(mix('js/assets/header.js')) }}"></script>
