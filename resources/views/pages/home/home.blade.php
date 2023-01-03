@extends('layouts.master')
@section('meta')
    <style>
        .cm-content,
        .cm-gutter {
            min-height: 150px;
        }

        .cm-scroller {
            overflow: auto;
        }
    </style>
@endsection
@section('content')
    <div id=editor>
    </div>
    <br>
    <div id=editor1></div>
    <button id="btn"> akjs </button>
    <script src="{{ asset('js/code-mirror.js') }}"></script>
    <script type="text/javascript">
    </script>
@endsection
