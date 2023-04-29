@extends('admin.master')
@section('head')
    <title> Chi tiết | Devsne</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="lesson_save">
                    <div class="lesson_save_alert"> Vui lòng chọn type template</div>
                    <a href="{{ route('admin.template.list', $template->type) }}" class="lesson_btn_back btn btn-warning">
                        Trở lại
                    </a>
                    <button class="lesson_btn_save btn btn-primary">
                        Lưu
                    </button>
                </div>
                <div>
                    <div class="template_info" type="update" template_id="{{ $template->id }}">
                        <select class="course_select">
                            @foreach ($type_list as $type)
                                <option value="{{ $type->id }}" {{ $type->id == $template->type ? 'selected' : '' }}>{{ $type->slug }}</option>
                            @endforeach
                        </select>
                        <div style="display: flex; flex-wrap: wrap;justify-content: space-between">
                            <style>
                                .form-control {
                                    width: 45%;
                                    margin: 10px 0;
                                }
                            </style>
                            <input type="text" class="form-control title" style="color: #fff" placeholder="title"
                                value="{{ $template->title }}">
                            <input type="text" class="form-control slug" style="color: #fff" placeholder="slug"
                                value="{{ $template->slug }}">
                            <input type="text" class="form-control height" style="color: #fff" placeholder="height"
                                value="{{ $template->height }}">
                        </div>
                    </div>
                    <div class="lesson_content">
                        <div class="lesson_card" id="html{{ $template->id }}" value="{{ $template->auto }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('lib/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset(mix('js/template_admin.js')) }}"></script>
@endsection
