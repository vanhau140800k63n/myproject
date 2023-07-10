@extends('layouts.master')
@section('head')
<title> Không tìm thấy trang | {{ $_SERVER['REQUEST_URI'] }} | DEVSNE </title>
@endsection
@section('content')
    <div class="box">
        <div class="error">
            <div class="container-floud">
                <div class="container-error-404">
                    <div class="clip">
                        <div class="shadow"><span class="digit thirdDigit">4</span></div>
                    </div>
                    <div class="clip">
                        <div class="shadow"><span class="digit secondDigit">0</span></div>
                    </div>
                    <div class="clip">
                        <div class="shadow"><span class="digit firstDigit">4</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
