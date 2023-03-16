@extends('layouts.master')
@section('head')
    <title> Game Design - Devsne</title>
    <style>
        .footer_box {
            display: none;
        }

        .header-box {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="game_design">
        <div class="game_editer_box">
            <div class="game_lg_mode">
                <button class="game_run"> Run code </button>
                <select class="game_lg_select">
                    @foreach ($course_list as $course)
                        <option value="{{ $course->name }}" {{ $course->name == 'js' ? 'selected' : '' }}>
                            {{ $course->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="game_editer"></div>
        </div>
        <div class="game_creen">
            @include('pages.game.nooff')
            <div class="game_test_case"></div>
            <div class="game_tutorial">
                <h3>Hướng dẫn</h3>
                <ul>
                    <li><kbd>w</kbd> hoặc <kbd><i class="fa-solid fa-caret-up"></i></kbd> <span>Nhảy lên</span></li>
                    <li><kbd>a</kbd> hoặc <kbd> <i class="fa-solid fa-caret-left"></i> </kbd> <span>Đi sang trái</span></li>
                    <li><kbd>d</kbd> hoặc <kbd><i class="fa-solid fa-caret-right"></i></kbd> <span>Đi sang phải</span></li>
                </ul>
            </div>

        </div>
    </div>
    <script src="{{ asset(mix('js/game_editer.js')) }}"></script>
@endsection
