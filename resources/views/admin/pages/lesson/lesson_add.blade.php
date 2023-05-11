@extends('admin.master')
@section('head')
    <title> Thêm bài giảng | Devsne</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="lesson_save">
                    <div class="lesson_save_alert"> Vui lòng chọn khóa học</div>
                    <a href="{{ route('admin.course.list') }}" class="lesson_btn_back btn btn-warning">
                        Trở lại
                    </a>
                    <button class="lesson_btn_save btn btn-primary">
                        Lưu
                    </button>
                </div>
                <div>
                    <div class="lesson_info" type="add">
                        <div class="url_content" style="display: none"></div>
                        <select class="course_select">
                            <option value='0'>Chọn khóa học:</option>
                            @foreach ($course_list as $course)
                                <option value="{{ $course->id }}" name="{{ $course->name }}">{{ $course->full_name }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control main_title" style="color: #fff"
                            placeholder="Tiêu đề chính">
                        <input type="text" class="form-control sub_title" style="color: #fff" placeholder="Tiêu đề phụ">
                    </div>
                    <div class="lesson_main">
                        <label>Bài viết chính</label>
                        <select class="lesson_main_select" style="width:100%">
                            
                        </select>
                    </div>
                    <div class="lesson_content">
                    </div>
                    <div class="lesson_content_add">
                        <select class="lesson_content_select">
                            <option value="0">Chọn mục:</option>
                            <option value="text">Văn bản</option>
                            @foreach ($course_list as $course)
                                <option value="{{ $course->name }}">Code {{ $course->full_name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="lesson_content_btn_add btn btn-info btn-fw">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('lib/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset(mix('js/admin.js')) }}"></script>
@endsection
