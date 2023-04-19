@extends('admin.master')
@section('head')
    <title> Khóa học | Devsne</title>
@endsection
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between;">
                        <h4 class="card-title">Khóa học</h4>
                        <a class="btn btn-primary" style="display: flex; align-items: center; justify-content: center;"
                            href="{{ route('admin.course.lesson.add') }}"> Thêm </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">   
                            <thead>
                                <tr>
                                    <th width="10%"> ID </th>
                                    <th width="60%"> Bài học </th>
                                    <th width="10%" style="text-align: center"> Truy cập </th>
                                    <th width="10%" style="text-align: center"> Chi tiết </th>
                                    <th width="10%" style="text-align: center"> Thao tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lesson_list as $lesson)
                                    <tr>
                                        <td> {{ $lesson->id }} </td>
                                        <td> {{ $lesson->sub_title }} </td>
                                        <td style="text-align: center"> 0 </td>
                                        <td> <a class="btn btn-info"
                                                style="display: flex; align-items: center; justify-content: center;"
                                                href="{{ route('admin.course.lesson.detail', ['id' => $lesson->id]) }}">Chi
                                                tiết</a> </td>
                                        <td> <a class="btn btn-danger"
                                                style="display: flex; align-items: center; justify-content: center;"
                                                href="{{ route('admin.course.lesson.del_lesson', ['id' => $lesson->id]) }}">Xóa</a>
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
