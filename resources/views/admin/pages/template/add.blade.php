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
                    <button class="lesson_btn_save btn btn-primary">
                        Lưu
                    </button>
                </div>
                <div>
                    <div class="template_info" type="add">
                        <select class="course_select">
                            @foreach ($type_list as $type)
                                <option value="{{ $type->id }}">{{ $type->slug }}</option>
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
                                value="">
                            <input type="text" class="form-control slug" style="color: #fff" placeholder="slug"
                                value="">
                            <input type="text" class="form-control height" style="color: #fff" placeholder="height"
                                value="">
                            <input type="text" class="form-control view" style="color: #fff" placeholder="view"
                                value="">
                            <input type="text" class="form-control tag" style="color: #fff" placeholder="tag"
                                value="">
                        </div>
                    </div>
                    <div class="lesson_content">
                        <textarea id="text-zyyx" name="description"></textarea>
                        <div class="lesson_card" id="html_zyyx" value=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('lib/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset(mix('js/template_admin.js')) }}"></script>
@endsection
