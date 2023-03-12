@extends('layouts.master')
@section('head')
    <title> Game Design </title>
    <link rel="stylesheet" href="https://devsnes.github.io/nooff/main.css">
    <script src="https://devsnes.github.io/nooff/main.js" type="module" defer></script>
@endsection
@section('content')
    <div class="game_design">
        <div class="game_editer"></div>
        @include('pages.game.nooff')
        <div class="game_tutorial">

            <h3>Hướng dẫn</h3>
            <ul>
                <li><kbd>w</kbd> hoặc <kbd><i class="fa-solid fa-caret-up"></i></kbd> <span>Nhảy lên</span></li>
                <li><kbd>a</kbd> hoặc <kbd> <i class="fa-solid fa-caret-left"></i> </kbd> <span>Đi sang trái</span></li>
                <li><kbd>d</kbd> hoặc <kbd><i class="fa-solid fa-caret-right"></i></kbd> <span>Đi sang phải</span></li>
            </ul>
        </div>
        <div class="game_test_case"></div>
    </div>
    <script src="{{ asset(mix('js/game_editer.js')) }}"></script>
@endsection
