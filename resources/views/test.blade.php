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
    <div class="color-box">
        <div class="shadow">
            <div class="info-tab tip-icon">
                <div></div><i class="fa-solid fa-rocket"></i>
            </div>
            <div class="tip-box">
                <p>ksjadbfkja ádnfaksjdn ksjadbfkja ádnfaksjdn ksjadbfkja ádnfaksjdn ksjadbfkja ádnfaksjdn ksjadbfkja
                    ádnfaksjdn ksjadbfkja ádnfaksjdn </p>
            </div>
        </div>
    </div>Ï
    <script>
        $('.test img').each(function() {
            $(this).attr('src', $(this).attr('data-src'));
        })
    </script>
@endsection
