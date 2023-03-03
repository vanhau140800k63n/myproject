@extends('admin.master')
@section('head')
    <title> Thêm bài đăng | Devsne</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="post_save">
                    <div class="post_save_alert"> Vui lòng chọn loại bài đăng</div>
                    <button class="post_btn_save btn btn-primary">
                        Lưu
                    </button>
                </div>
                <div>
                    <div class="post_info" type="add">
                        <select class="post_type_select">
                            <option value='0'>Thể loại:</option>
                            <option value='1'>Project</option>
                            <option value='2'>Blog</option>
                        </select>
                        <input type="text" class="form-control post_title" style="color: #fff" placeholder="Tiêu đề">
                        <input type="text" class="form-control post_img" style="color: #fff" placeholder="Thêm ảnh">
                        <input type="text" class="form-control post_view" style="color: #fff" placeholder="Lượt view">
                    </div>
                    <div class="post_content">
                    </div>
                    <div class="post_content_add">
                        <select class="post_content_select">
                            <option value="0">Chọn mục:</option>
                            <option value="text">Văn bản</option>
                            @foreach ($course_list as $course)
                                <option value="{{ $course->name }}">Code {{ $course->full_name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="post_content_btn_add btn btn-info btn-fw">Thêm</button>
                    </div>
                </div>
                <div class="post_save_end">
                    <button class="post_btn_save btn btn-primary">
                        Lưu
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('lib/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset(mix('js/post_admin.js')) }}"></script>
@endsection
