@extends('admin.master')
@section('head')
    <title> Thêm bài đăng | Devsne</title>
@endsection
@section('content')
    <div class="auto_add" hidden>
        {!! $data !!}
    </div>
    <script src="{{ asset(mix('js/solution_admin.js')) }}"></script>
@endsection
