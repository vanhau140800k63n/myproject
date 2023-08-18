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
    <link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css" />
    <script defer src="https://pyscript.net/latest/pyscript.js"></script>
@endsection
@section('content')
    <div style="margin-top: 100px"></div>
    <py-script>
        def hello():
            return 'Goodbye, Mars!'
        print(hello())
    </py-script>
@endsection
