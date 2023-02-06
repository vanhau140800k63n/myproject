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
                                    <th> Bài học </th>
                                    <th> Truy cập </th>
                                    <th> Chi tiết </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lesson_list as $lesson)
                                    <tr>
                                        <td> {{ $lesson->id }} </td>
                                        <td> {{ $lesson->title }} </td>
                                        <td> 0 </td>
                                        <td> <a href="">Chi tiết</a> </td>
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
