@extends('layouts.master')
@section('meta')
    <meta name="description"
        content="Devsne đã tổng hợp hơn 30 khóa học miễn phí về html, css, javascript, python, java, c++. Khóa học đi kèm luyện tập trực tuyến sẽ giúp bạn nhanh chóng cải thiện được khả năng lập trình">
    <meta name="keywords"
        content="devsne, devsnevn, Miễn phí Lập trình Khóa học, php, java, python, c++, Cpp, HTML, css, javascript, contest, design, contest-design, template">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
@endsection
@section('head')
    <title> Online Contest | DEVSNE</title>
    <style>
        .footer_box {
            display: none;
        }

        .header-box {
            display: none;
        }

        .contest_editer .ͼ1.cm-editor {
            height: calc(100vh - 150px) !important;
        }
    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/a11y-dark.min.css">
    <script>
        hljs.highlightAll();
    </script>
@endsection
@section('content')
    <div class="contest_design editer_font">
        <div class="contest_editer_box">
            <div class="contest_editer" value="{{ $practice_code }}" lang="{{ $exercise['language'] }}"></div>
            <div class="contest_lg_mode">
                <button class="contest_run"> Chạy Thử <i class="fa-solid fa-loader fa-spin"
                        style="display: none"></i></button>
                <button class="contest_submit"> Nộp Bài </button>
            </div>
        </div>
        <main class="contest_screen">
            <aside class="time_countdown">
                <div class="time_countdown_bg">
                    <div class="time_countdown_el"></div>
                </div>
            </aside>
            {!! $practice_html !!}
        </main>
    </div>
    <details class="editer_font">
        <summary>Hướng dẫn<svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="currentColor"
                viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none"></rect>
                <circle cx="128" cy="128" r="96" fill="none" stroke="currentColor" stroke-lin editer
                    bên tráiecap="round" stroke-linejoin="round" stroke-width="16"></circle>
                <circle cx="128" cy="180" r="12"></circle>
                <path d="M127.9995,144.0045v-8a28,28,0,1,0-28-28" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
            </svg></summary>
        <div>
            <p><span>1</span>Hoàn thành thử thách với đề bài bên phải. Mỗi người tham gia sẽ sử dụng
                kiến thức để viết đoạn code của mình vào ô bên trái
            </p>
            <pre>
                <code>public class Main { 
                        &nbsp;&nbsp;public static void main(String[] args) {
                        &nbsp;&nbsp;&nbsp;&nbsp;// your code here
                        &nbsp;&nbsp;}
                        }</code></pre>
            <p><span>2</span>Thời gian sẽ được tính từ lúc bạn vào thử thách
            </p>
            <p><span>3</span>Sử dụng nút <button>Chạy Thử</button> để kiểm tra, nút <button>Nộp Bài</button> nộp
                kết quả
                và kết thúc bài thi
            </p>
        </div>
    </details>
    <div class="contest_modal_bg editer_font">
        <div class="contest_modal">
            <div class="cm_title"> Xác Nhận Nộp Bài </div>
            <div class="cm_action">
                <button class="cm_action_cancel">Quay Lại</button>
                <button class="cm_action_submit">Nộp Bài</button>
            </div>
        </div>
    </div>
    <script src="{{ asset(mix('js/contest.js')) }}"></script>
@endsection
