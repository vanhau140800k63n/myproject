@extends('layouts.master')
@section('meta')
@endsection
@section('head')
    <title>Code Exam | DEVSNE</title>
@endsection
@section('content')
    <main class="ex_main ">
        <div class="ex_container">
            <div class="track-icons">
                @foreach ($exam_list as $exam)
                    <img alt="" role="presentation" class="c-icon c-track-icon" src="{{ $exam['image'] }}">
                @endforeach
            </div>
            <h1 class="text-h1">{{ count($exam_list) }} Ngôn Ngữ Giúp Bạn Thành Thạo Lập Trình</h1>
            <p class="text-p-large">
                Trở nên thông thạo các ngôn ngữ lập trình bạn đã chọn bằng cách hoàn thành các bài tập của cộng đồng DEVSNE
            </p>
        </div>

        <div class="joined-tracks">
            @foreach ($exam_list as $key => $exam)
                <a class="--track e-hover-grow" href="{{ route('exam.get_exercise_info', ['language' => $key]) }}">
                    <img class="c-icon c-track-icon" src="{{ $exam['image'] }}" alt="icon for Java track">
                    <div class="--info">
                        <div class="--heading">
                            <h3 class="--title">Bài tập {{ $exam['name'] }}</h3>
                            <div class="--joined"><span class="hidden lg:block">Bắt đầu</span>
                            </div>
                        </div>
                        <ul class="--counts">
                            <li><img src="{{ asset('svg/exercises.svg') }}" alt="Number of exercises" class="c-icon">
                                {{ $exam['practices_num'] }} bài tập</li>
                            <li><img src="{{ asset('svg/concepts.svg') }}" alt="Number of concepts" class="c-icon">
                                {{ $exam['concepts_num'] }} chủ đề</li>
                        </ul>

                        <div class="--last-touched">
                            <button class="--btn" style="background-image: radial-gradient( circle 369px at -2.9% 12.9%,  rgba(247,234,163,1) 0%, rgba(236,180,238,0.56) 46.4%, rgba(163,203,247,1) 100.7% );">{{ $exam['name'] }} cơ bản</button>
                            <button class="--btn" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(176,229,208,1) 42%, rgba(92,202,238,0.41) 93.6% ); margin-left: 10px">{{ $exam['name'] }} nâng cao</button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
@endsection
