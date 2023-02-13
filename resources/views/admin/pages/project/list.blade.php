@extends('admin.master')
@section('head')
    <title> Project </title>
@endsection
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Project</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Title </th>
                                    <th> Số lượng </th>
                                    <th> Chi tiết </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project_list as $project)
                                    <tr>
                                        <td> {{ $project->id }} </td>
                                        <td> {{ $project->title }} </td>
                                        <td> 0 </td>
                                        <td> 0 </td>
                                        <td> <a href="">Chi tiết</a>
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
