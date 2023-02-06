@extends('admin.master')
@section('head')
    <title> Trang chủ | Topfilm </title>
    <style>
        .preview-list .preview-item {
            cursor: pointer;
        }

        .preview-list .preview-item:hover {
            background-color: #2e2f32;
            padding-left: 10px;
            padding-right: 10px;
            transition: 0.3s;
        }
        
        .tox .tox-statusbar {
            display: none !important;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 test">
                {{-- <textarea id="myeditorinstance" name="description"></textarea> --}}
            </div>
        </div>
    </div>
@endsection
