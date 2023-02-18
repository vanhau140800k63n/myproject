@extends('admin.master')
@section('head')
    <title> Chi tiết | Devsne</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="post_save">
                    <div class="post_save_alert"> Vui lòng chọn khóa học</div>
                    <button class="post_btn_save btn btn-primary">
                        Lưu
                    </button>
                </div>
                <div>
                    <div class="post_info" type="update" post_id="{{ $post->id }}">
                        <select class="post_type_select">
                            @foreach ($post_types as $key => $post_type)
                                @if (intval($key) === intval($post->type))
                                    <option value="{{ $key }}" selected>{{ $post_type }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="text" class="form-control post_title" style="color: #fff"
                            placeholder="Tiêu đề chính" value="{{ $post->title }}">
                        <input type="text" class="form-control post_img" style="color: #fff"
                            placeholder="Thêm ảnh" value="{{ $post->image }}">
                        <input type="text" class="form-control post_view" style="color: #fff"
                            placeholder="Lượt view" value="{{ $post->view }}">
                    </div>
                    <div class="post_content">
                        @foreach ($post_detail as $item)
                            <div class="post_content_form" type="{{ $item->type }}" id="{{ $item->id }}"
                                code="{{ $item->p_language_id }}">
                                <div class="post_content_form_info">
                                    <input type="text" class="form-control post_content_form_title" style="color: #fff"
                                        placeholder="Tiêu đề" value="{{ $item->title }}">
                                    <div class="post_content_form_type {{ $item->compiler == 0 ? 'not_run' : '' }}">
                                        {{ is_null($item->p_language_id) ? 'text' : $item->p_language_id }}</div>
                                    <button class="post_content_form_remove_btn btn btn-danger btn-fw"> Xóa </button>
                                </div>
                                @if ($item->type === 'text')
                                    <textarea id="text-{{ $item->id }}" name="description">{{ $item->content }}</textarea>
                                @else
                                    <div class="post_card" id="{{ $item->p_language_id . $item->id }}"
                                        value="{{ $item->content }}" lang="{{ $item->p_language_id }}"></div>
                                @endif
                            </div>
                        @endforeach
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
            </div>
        </div>
    </div>
    <script src="{{ asset('lib/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset(mix('js/post_admin.js')) }}"></script>
@endsection
