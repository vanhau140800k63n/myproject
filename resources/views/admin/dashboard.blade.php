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
            <div class="col-sm-12">
                {{-- <textarea id="myeditorinstance" name="description"></textarea> --}}
            </div>
        </div>
    </div>
    <script src="{{ asset('lib/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists image',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | forecolor backcolor | image',
            images_file_types: 'jpg,svg,webp',
        });
    </script>
@endsection
