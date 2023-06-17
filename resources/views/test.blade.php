@extends('layouts.master')
@section('head')
    {{-- <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script> --}}
@endsection
@section('content')
    <div class="test">
        @foreach ($arr as $item)
            {!! $item !!}
        @endforeach
    </div>
    <script>
        $('.test img').each(function() {
            $(this).attr('src', $(this).attr('data-src'));
        })
    </script>
@endsection
