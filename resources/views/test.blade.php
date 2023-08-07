@extends('layouts.master')
@section('head')
    {{-- <style>
        .skiptranslate,
        #google_translate_element {
            display: none;
        }

        body {
            min-height: 0px !important;
            position: static !important;
            top: 0px !important;
        }
    </style> --}}
@endsection
@section('content')
    <h1 style="margin-top: 100px">My Web Page</h1>

    <p>Hello everybody!</p>

    <p>Translate this page:</p>

    <div id="google_translate_element"></div>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi',
                includedLanguages: 'vi',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>


    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <p>You can translate the content of this page by selecting a language in the select box.</p>
@endsection
