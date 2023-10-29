@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/stackoverflow-light.min.css"
        integrity="sha512-RDtnAhiPytLVV3AwzHkGVMVI4szjtSjxxyhDaH3gqdHPIw5qwQld1MVGuMu1EYoof+CaEccrO3zUVb13hQFU/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/languages/go.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
    <style>
        .skiptranslate {
            display: none !important;
        }

        body {
            top: 0 !important;
        }
    </style>
    <title> {{ $solution->title }} | DEVSNE</title>
@endsection
@section('content')
    <div class="sol_box">
        <div class="_sidebar">
        </div>
        <div class="_solution">
            <div class="_header">
                <h1 class="_title">{{ $solution->title }}</h1>
                <div class="_info">
                    <div><span>Asked </span> {{ $solution->created_at }} <span> View</span>
                        {{ number_format($solution->view) }}</div>

                    <button class="_switch_language notranslate" lang='en'>
                        <img src="https://devsne.vn/image/icon/8ZU3O5N1AV.png"> Tiếng Việt
                    </button>
                </div>
            </div>
            <div class="_body">
                <div class="_question">
                    <div class="_content">
                        {!! $question->content !!}
                    </div>
                    @if ($question_comments->count() > 0)
                        <ul class="_comment_list">
                            @foreach ($question_comments as $comment)
                                <li class="_comment">{!! $comment->content !!} -<a class="_author"> anyone </a></li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="_action">
                        <button>Add a comment</button>
                    </div>
                </div>
                <h2>Answers</h2>
                @foreach ($answers as $answer)
                    <div class="_answer">
                        <div class="_attached"></div>
                        <div class="_content">{!! $answer->content !!}</div>
                        <div class="_solution_item_info">
                            <div class="_action">
                                <button>Share</button>
                                <button>Edit</button>
                            </div>
                            <div class="_answer_info">
                                <p>Answered &nbsp; {{ $answer->created_at }}</p>
                                <div class="_user_info">
                                    <img src="{{ asset('img/no_avata.jpg') }}">
                                    <a style="margin-left: 10px">anyone</a>
                                </div>
                            </div>
                        </div>
                        @if (isset($answer_comments_list[$answer->id]))
                            <ul class="_comment_list">
                                @foreach ($answer_comments_list[$answer->id] as $comment)
                                    <li class="_comment">{!! $comment->content !!} -<a class="_author"> anyone </a></li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="_action">
                            <button>Add a comment</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="_aside">
            <button class="_add_question"> Add question </button>
            <div class="_solution_related">
                @foreach ($random_solutions as $key => $r_solution)
                    <nav class="_random">
                        <img width="20" height="20" src="{{ asset($random_icons[$key]->image) }}">
                        <a
                            href="{{ route('solution.detail', ['id' => $r_solution->id, 'slug' => $r_solution->slug]) }}">{{ $r_solution->title }}</a>
                    </nav>
                @endforeach
            </div>
        </div>
    </div>
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
        $('._switch_language').click(function() {
            if ($(this).attr('lang') == 'en') {
                $(this).attr('lang', 'vi');
                var selectElement = document.querySelector('#google_translate_element select');
                selectElement.value = 'vi';
                selectElement.dispatchEvent(new Event('change'));
                selectElement.value = 'vi';
                selectElement.dispatchEvent(new Event('change'));
                $(this).html('<img src="https://devsne.vn/image/icon/zos3frNRqM.png">English');
            } else {
                $(this).attr('lang', 'en');
                var selectElement = document.querySelector('#google_translate_element select');
                selectElement.value = 'en';
                selectElement.dispatchEvent(new Event('change'));
                $(this).html('<img src="https://devsne.vn/image/icon/8ZU3O5N1AV.png">Tiếng Việt');
            }
        });
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
@endsection
