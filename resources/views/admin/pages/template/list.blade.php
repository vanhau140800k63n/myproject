@extends('admin.master')
@section('head')
    <title> Template | Devsne</title>
@endsection
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between;">
                        <h4 class="card-title">Template</h4>
                        <a class="btn btn-primary" style="display: flex; align-items: center; justify-content: center;"
                            href=""> Thêm </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="10%"> ID </th>
                                    <th width="60%"> Template </th>
                                    <th width="10%" style="text-align: center"> Truy cập </th>
                                    <th width="10%" style="text-align: center"> Chi tiết </th>
                                    <th width="10%" style="text-align: center"> Thao tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_template as $template)
                                    <tr>
                                        <td> {{ $template->id }} </td>
                                        <td> {{ $template->title }} </td>
                                        <td style="text-align: center"> 0 </td>
                                        <td> <a class="btn btn-info"
                                                style="display: flex; align-items: center; justify-content: center;"
                                                href="">Chi
                                                tiết</a> </td>
                                        <td> <a class="btn btn-danger"
                                                style="display: flex; align-items: center; justify-content: center;"
                                                href="">Xóa</a>
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
