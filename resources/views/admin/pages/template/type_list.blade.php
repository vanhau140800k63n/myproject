@extends('admin.master')
@section('head')
    <title> Danh sách loại template </title>
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
                                    <th> Type </th>
                                    <th> Số lượng </th>
                                    <th> Truy cập </th>
                                    <th> Chi tiết </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($type_list as $type)
                                    <tr>
                                        <td> {{ $type->id }} </td>
                                        <td> {{ $type->slug }} </td>
                                        <td> </td>
                                        <td> {{ $type->view }} </td>
                                        <td> <a href="{{ route('admin.template.list', $type->id) }}">Chi tiết</a>
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
