@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <title>Luyện Tập {{ ucwords($exercise['name']) }} | DEVSNE</title>
@endsection
@section('content')
    <main class="ex_main">
        <section class="exercises">
            <div class="exercise_info_mid">
                <img class="exercise_info_mid_img" src="{{ $exercise['image'] }}">
                <div class="exercise_info_mid_text">
                    Luyện tập {{ ucwords($exercise['name']) }} với các thử thách trên DEVSNE
                </div>
            </div>
            <div class="c-react-component c-react-wrapper-student-exercise-list --hydrated"
                data-react-id="student-exercise-list" data-react-hydrate="false">
                <div class="lg-container container">
                    <div class="c-results-zone">
                        <div class="exercises grid-cols-1 md:grid-cols-2">
                            @foreach ($exercise['practices'] as $practice => $practice_info)
                                <a href="{{ route('exam.get_practice_detail', ['language' => $exercise['type'], 'practice' => $practice]) }}"
                                    class="c-exercise-widget {{ $practice_info['status'] == 0 ? '--lock' : '' }}">
                                    <img class="c-icon c-exercise-icon"
                                        src="{{ $practice_info['image'] == '' ? "https://dg8krxphbh767.cloudfront.net/exercises/$practice.svg" : $practice_info['image'] }}"
                                        alt="Icon for exercise called Hello World">
                                    <div class="--info">
                                        <div class="--title">
                                            {{ str_replace('-', ' ', $practice_info['name'] == '' ? $practice : $practice_info['name']) }}
                                        </div>
                                        <div class="--data">
                                            @if ($practice_info['status'] == 0)
                                                <div class="c-exercise-status-tag --recommended --small">Khóa</div>
                                            @endif
                                            <div class="c-exercise-type-tag">
                                                {{ $practice_info['difficulty'] }}</div>
                                            <div class="c-exercise-type-tag">
                                                {{ $exercise['name'] }}</div>
                                        </div>
                                        <div class="--blurb">
                                            {{ $practice_info['description'] == '' ? 'Bài tập đang hoàn thiện' : $practice_info['description'] }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
