@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <title>Code Exam | DEVSNE</title>
@endsection
@section('content')
    <main class="ex_main">
        <div class="ex_container">
            <div class="track-icons">
                @foreach ($exam_list as $exam)
                    <img alt="" role="presentation" class="c-icon c-track-icon" src="{{ $exam['image'] }}">
                @endforeach
            </div>
            <h1 class="text-h1">67 languages for you to master</h1>
            <p class="text-p-large">
                Become fluent in your chosen programming languages by completing these tracks created by our
                <a class="text-prominentLinkColor" href="https://exercism.org/contributing/contributors">awesome team of
                    contributors</a>
            </p>
        </div>

        <div class="joined-tracks">
            @foreach ($exam_list as $key => $exam)
                <a class="--track e-hover-grow" href="{{ route('exam.get_exercise_info', ['language' => $key]) }}">
                    <img class="c-icon c-track-icon hidden lg:block" src="{{ $exam['image'] }}" alt="icon for Java track">
                    <div class="--info">
                        <div class="--heading">
                            <h3 class="--title">{{ str_replace('-', ' ', $exam['name']) }}</h3>
                            <div class="--joined"><img src="{{ asset('svg/checkmark.svg') }}" alt=""
                                    role="presentation" class="c-icon lg:mr-8"><span class="hidden lg:block">Joined</span>
                            </div>
                        </div>
                        <ul class="--counts">
                            <li><img src="{{ asset('svg/exercises.svg') }}" alt="Number of exercises" class="c-icon">0/133
                                exercises</li>
                            <li><img src="{{ asset('svg/concepts.svg') }}" alt="Number of concepts" class="c-icon">17
                                concepts</li>
                        </ul>
                        <div class="--progress-bar">
                            <div class="--fill" style="width: 0%;"></div>
                        </div>
                        <div class="--last-touched">Last touched an hour ago</div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
@endsection
