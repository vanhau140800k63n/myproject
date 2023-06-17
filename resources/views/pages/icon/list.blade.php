@extends('layouts.master')
@section('head')
    <title>Free 1000+ {{ $word }} Icons For Design | DEVSNE</title>
@endsection
@section('content')
    <div class="icon_container">
        <aside class="icon_filters">
            <div class="i_f_title">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 17 16" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.17375 2.39015H15.5334C16.0239 2.39015 16.4216 2.78782 16.4216 3.27835C16.4216 3.76888 16.0239 4.16654 15.5334 4.16654H7.17375C6.80707 5.20032 5.81982 5.94292 4.66194 5.94292C3.50406 5.94292 2.51678 5.20032 2.15013 4.16654H0.896005C0.405474 4.16654 0.0078125 3.76888 0.0078125 3.27835C0.0078125 2.78782 0.405474 2.39015 0.896005 2.39015H2.15013C2.51681 1.35637 3.50406 0.61377 4.66194 0.61377C5.81982 0.61377 6.80707 1.35637 7.17375 2.39015ZM3.77465 3.27873C3.77465 3.76848 4.17309 4.16693 4.66284 4.16693C5.15259 4.16693 5.55103 3.76848 5.55103 3.27873C5.55103 2.78898 5.15259 2.39054 4.66284 2.39054C4.17309 2.39054 3.77465 2.78898 3.77465 3.27873ZM7.17375 12.338H15.5334C16.0239 12.338 16.4216 12.7357 16.4216 13.2262C16.4216 13.7168 16.0239 14.1144 15.5334 14.1144H7.17375C6.80707 15.1482 5.81982 15.8908 4.66194 15.8908C3.50406 15.8908 2.51678 15.1482 2.15013 14.1144H0.896005C0.405474 14.1144 0.0078125 13.7168 0.0078125 13.2262C0.0078125 12.7357 0.405474 12.338 0.896005 12.338H2.15013C2.51681 11.3043 3.50406 10.5617 4.66194 10.5617C5.81982 10.5617 6.8071 11.3043 7.17375 12.338ZM3.77465 13.2264C3.77465 13.7161 4.17309 14.1146 4.66284 14.1146C5.15259 14.1146 5.55103 13.7161 5.55103 13.2264C5.55103 12.7366 5.15259 12.3382 4.66284 12.3382C4.17309 12.3382 3.77465 12.7366 3.77465 13.2264ZM15.5334 7.36416H14.2793C13.9126 6.33037 12.9254 5.58777 11.7675 5.58777C10.6096 5.58777 9.62235 6.33037 9.25567 7.36416H0.896005C0.405474 7.36416 0.0078125 7.76182 0.0078125 8.25235C0.0078125 8.74288 0.405474 9.14054 0.896005 9.14054H9.25567C9.62232 10.1743 10.6096 10.9169 11.7675 10.9169C12.9254 10.9169 13.9126 10.1743 14.2793 9.14054H15.5334C16.0239 9.14054 16.4216 8.74288 16.4216 8.25235C16.4216 7.76182 16.0239 7.36416 15.5334 7.36416ZM11.7683 9.14069C11.2786 9.14069 10.8801 8.74225 10.8801 8.2525C10.8801 7.76275 11.2786 7.36431 11.7683 7.36431C12.2581 7.36431 12.6565 7.76275 12.6565 8.2525C12.6565 8.74225 12.2581 9.14069 11.7683 9.14069Z"
                        fill="#1D262D"></path>
                </svg>
                <h2>Bộ lọc</h2>
            </div>

            <?php
            $show_filters = false;
            foreach ($filter_selected as $type => $item) {
                if ($item != '') {
                    $show_filters = true;
                }
            }
            ?>

            @if ($show_filters)
                <div class="icon_filters_item">
                    <div class="i_f_i_title">
                        <i class="fa-regular fa-circle-check"></i>
                        <h3>Đã chọn</h3>
                    </div>
                    <div class="i_f_t_selected">
                        @foreach ($filter_selected as $type => $item)
                            @if ($item != '')
                                <div class="i_f_t_selected_item">{{ $item }}<i class="fa-solid fa-xmark"
                                        type="{{ $type }}"></i></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="icon_filters_item">
                <div class="i_f_i_title">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.59755 14.4404C5.72198 14.4668 5.84721 14.4799 5.97154 14.4799C6.37527 14.4799 6.76889 14.3424 7.08998 14.0826C7.50985 13.7427 7.75066 13.238 7.75066 12.6978V11.9631C7.75066 11.4341 8.18101 11.0038 8.70997 11.0038H10.6753C11.5742 11.0038 12.4229 10.6577 13.0652 10.0293C13.7108 9.39764 14.0718 8.55469 14.0816 7.65577C14.082 7.61794 14.0821 7.58009 14.082 7.54221C14.0629 3.68982 10.9166 0.561035 7.06534 0.561035L7.05117 0.561063C5.17995 0.564818 3.42133 1.29633 2.09927 2.62085C0.777022 3.94559 0.0488281 5.70597 0.0488281 7.57768C0.0488281 9.19411 0.611884 10.7719 1.63428 12.0205C2.64226 13.2514 4.04978 14.1108 5.59755 14.4404ZM7.05391 1.93049H7.06534C10.1642 1.93049 12.6962 4.44828 12.7116 7.54809C12.7117 7.5787 12.7116 7.60924 12.7113 7.63972V7.63977C12.6993 8.73847 11.786 9.63232 10.6753 9.63232H8.70997C7.42535 9.63232 6.38023 10.6774 6.38023 11.9621V12.6968C6.38023 12.8674 6.28468 12.9702 6.22773 13.0163C6.17072 13.0625 6.05023 13.1347 5.88298 13.099C3.29654 12.5482 1.41926 10.2257 1.41926 7.5767C1.41926 4.4696 3.94697 1.93671 7.05391 1.93049ZM3.33726 8.39902C2.88387 8.39902 2.515 8.03015 2.515 7.57676C2.515 7.12337 2.88387 6.7545 3.33726 6.7545C3.79066 6.7545 4.15952 7.12337 4.15952 7.57676C4.15952 8.03015 3.79066 8.39902 3.33726 8.39902ZM6.24258 3.84918C6.24258 4.30257 6.61145 4.67144 7.06484 4.67144C7.51823 4.67144 7.8871 4.30257 7.8871 3.84918C7.8871 3.39579 7.51823 3.02692 7.06484 3.02692C6.61145 3.02692 6.24258 3.39579 6.24258 3.84918ZM9.69999 5.76363C9.24659 5.76363 8.87773 5.39476 8.87773 4.94137C8.87773 4.48797 9.24659 4.11911 9.69999 4.11911C10.1534 4.11911 10.5222 4.48797 10.5222 4.94137C10.5222 5.39476 10.1534 5.76363 9.69999 5.76363ZM3.60743 4.94137C3.60743 5.39476 3.9763 5.76363 4.42969 5.76363C4.88309 5.76363 5.25195 5.39476 5.25195 4.94137C5.25195 4.48797 4.88309 4.11911 4.42969 4.11911C3.9763 4.11911 3.60743 4.48797 3.60743 4.94137Z"
                            fill="#374957"></path>
                    </svg>
                    <h3>Colors</h3>
                </div>
                <div class="i_f_i_category">
                    @foreach ($color_filters as $title => $img)
                        <button class="i_f_i_c_item" type="color" value="{{ $title }}"
                            {{ $title == 'gradient' && $filter_selected['shape'] == 'hand-drawn' ? 'disabled' : '' }}>
                            <img src="{{ $img }}" alt="black" width="16" height="16">
                            {{ $title }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="icon_filters_item">
                <div class="i_f_i_title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 17 14"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.4624 13.4079C14.3752 13.4079 14.2877 13.3872 14.2076 13.3454L11.3348 11.8464L8.46208 13.3454C8.27754 13.4417 8.05393 13.4256 7.88531 13.304C7.71665 13.1824 7.63217 12.9763 7.66742 12.7723L8.21607 9.59733L5.89197 7.34878C5.7427 7.20436 5.68896 6.98833 5.75339 6.79155C5.81779 6.59474 5.98922 6.45134 6.19552 6.42157L9.40734 5.95834L10.8437 3.0696C10.936 2.88406 11.1264 2.7666 11.3348 2.7666C11.5433 2.7666 11.7337 2.88406 11.826 3.06963L13.2623 5.95836L16.4741 6.42159C16.6804 6.45134 16.8518 6.59476 16.9163 6.79157C16.9807 6.98835 16.927 7.20438 16.7777 7.3488L14.4536 9.59735L15.0022 12.7724C15.0375 12.9763 14.953 13.1824 14.7844 13.304C14.6889 13.3728 14.576 13.4079 14.4624 13.4079Z"
                            fill="#374957"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.73243 12.1254C9.63542 12.1254 9.53804 12.1024 9.44885 12.0559L6.25158 10.3875L3.05431 12.0559C2.84892 12.163 2.60005 12.1452 2.41238 12.0098C2.22467 11.8744 2.13065 11.645 2.16988 11.4181L2.7805 7.88436L0.193861 5.3818C0.0277217 5.22106 -0.0320874 4.98063 0.0396202 4.76162C0.111303 4.54258 0.302093 4.38298 0.531699 4.34985L4.10635 3.83428L5.70498 0.619215C5.80768 0.412713 6.01956 0.281982 6.25161 0.281982C6.48365 0.281982 6.69553 0.412713 6.7982 0.619239L8.39683 3.83431L11.9715 4.34987C12.2011 4.38298 12.3919 4.54261 12.4636 4.76164C12.5352 4.98066 12.4755 5.22109 12.3093 5.38183L9.72268 7.88439L10.3333 11.4181C10.3725 11.6451 10.2785 11.8745 10.0908 12.0098C9.98459 12.0864 9.85886 12.1254 9.73243 12.1254ZM6.25135 9.09887C6.34878 9.09887 6.44621 9.12203 6.53501 9.16838L8.92272 10.4143L8.46668 7.77535C8.43276 7.57909 8.49833 7.37883 8.64199 7.23985L10.5737 5.37092L7.90416 4.98592C7.70562 4.95729 7.53399 4.83353 7.44519 4.65496L6.25135 2.25396L5.05751 4.65496C4.96869 4.83353 4.79706 4.95729 4.59854 4.98592L1.92898 5.37092L3.86069 7.23985C4.00438 7.37883 4.06992 7.57909 4.036 7.77535L3.57998 10.4143L5.96769 9.16838C6.05647 9.12203 6.15392 9.09887 6.25135 9.09887Z"
                            fill="#374957"></path>
                    </svg>
                    <h3>Shape</h3>
                </div>
                <div class="i_f_i_category">
                    @foreach ($shape_filters as $title => $img)
                        <button class="i_f_i_c_item" type="shape" value="{{ $title }}"
                            {{ $title == 'hand-drawn' && $filter_selected['color'] == 'gradient' ? 'disabled' : '' }}>
                            <img src="{{ $img }}" alt="black" width="16" height="16">
                            {{ $title }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="icon_filters_item">
                <a href="{{ route('icon.search', ['word' => 'contest']) }}">
                    <div style="font-weight: 600; margin-bottom: 10px"> Free Contest Icons </div>
                    <img class="icon_search_example" src="{{ asset('image/contest_icons.png') }}">
                </a>
                <a href="{{ route('icon.search', ['word' => 'game']) }}">
                    <div style="font-weight: 600; margin-bottom: 10px; margin-top: 30px"> Free Game Icons </div>
                    <img class="icon_search_example" src="{{ asset('image/game_icons.png') }}">
                </a>
            </div>
        </aside>
        <main class="icon_list_box">
            <div class="icon_search">
                <input class="icon_search_input" value="{{ $word }}">
                <button class="icon_search_btn">Tìm kiếm</button>
            </div>
            <h1> Tìm kiếm: Free {{ $word }} Icons </h1>
            <div class="icon_list">
                @foreach ($arr as $item)
                    <article class="icon_list_item">
                        {!! $item !!}
                        <button class="icon_download_btn"><i class="fa-regular fa-download fa-bounce"></i></button>
                    </article>
                @endforeach
            </div>
        </main>
    </div>
    <script>
        var color = '{{ isset($filter_selected['color']) ? $filter_selected['color'] : '' }}';
        var shape = '{{ isset($filter_selected['shape']) ? $filter_selected['shape'] : '' }}';
        var word = '{{ $word }}';
        $('.icon_list img').each(function() {
            $(this).attr('src', $(this).attr('data-src'));
        })

        $('.i_f_i_c_item').click(function() {
            if ($(this).attr('type') == 'color') {
                color = $(this).attr('value');
            }
            if ($(this).attr('type') == 'shape') {
                shape = $(this).attr('value');
            }

            $url = window.location.origin + '/icon/search?word=' + word;

            if (color != '') {
                $url += '&color=' + color;
            }

            if (shape != '') {
                $url += '&shape=' + shape;
            }

            location.href = $url;
        })

        $('.i_f_t_selected_item i').click(function() {
            if ($(this).attr('type') == 'color') {
                color = '';
            }
            if ($(this).attr('type') == 'shape') {
                shape = '';
            }

            $url = window.location.origin + '/icon/search?word=' + word;

            if (color != '') {
                $url += '&color=' + color;
            }

            if (shape != '') {
                $url += '&shape=' + shape;
            }

            location.href = $url;
        })

        $('.icon_search_btn').click(function() {
            word = $('.icon_search_input').val();
            if (word == '') return false;

            location.href = window.location.origin + '/icon/search?word=' + word;
        })

        $('.icon_download_btn').click(function() {
            var image_path = $(this).parent().children('img').attr('src');
            var image_name = word + getFileName(image_path);

            saveAs(image_path, image_name);
        })

        function getFileName(str) {
            return str.substring(str.lastIndexOf('/') + 1);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"
        integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
