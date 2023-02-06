@extends('admin.master')
@section('head')
    <title> Khóa học </title>
@endsection
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Khóa học</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Khóa học </th>
                                    <th> Số lượng </th>
                                    <th> Truy cập </th>
                                    <th> Chi tiết </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course_list as $course)
                                    <tr>
                                        <td> {{ $course->id }} </td>
                                        <td> {{ $course->full_name }} </td>
                                        <td> {{ $course->lession_num }} </td>
                                        <td> 0 </td>
                                        <td> <a href="{{ route('admin.course.lesson_list', $course->name) }}">Chi tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
