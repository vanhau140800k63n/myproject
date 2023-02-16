@extends('admin.master')
@section('head')
    <title> Post </title>
@endsection
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between;">
                        <h4 class="card-title">Post</h4>
                        <a class="btn btn-primary" style="display: flex; align-items: center; justify-content: center;" href="{{ route('admin.post.add') }}"> Thêm </a>
                    </div>
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
                                @foreach ($post_list as $post)
                                    <tr>
                                        <td> {{ $post->id }} </td>
                                        <td> {{ $post->title }} </td>
                                        <td> 0 </td>
                                        <td> <a href="{{ route('admin.post.detail', ['id' => $post->id]) }}">Chi tiết</a>
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
