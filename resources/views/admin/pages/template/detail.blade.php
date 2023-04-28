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
                    <a href="{{ route('admin.course.lesson_list', $course_selected->name) }}"
                        class="lesson_btn_back btn btn-warning">
                        Trở lại
                    </a>
                    <button class="lesson_btn_save btn btn-primary">
                        Lưu
                    </button>
                </div>
                <div>
                    <div class="lesson_info" type="update" lesson_id="{{ $lesson->id }}">
                        <select class="course_select">
                            @foreach ($course_list as $course)
                                @if ($course->id === $course_selected->id)
                                    <option value="{{ $course->id }}" selected>{{ $course->full_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="text" class="form-control main_title" style="color: #fff"
                            placeholder="Tiêu đề chính" value="{{ $lesson->title }}">
                        <input type="text" class="form-control sub_title" style="color: #fff" placeholder="Tiêu đề phụ"
                            value="{{ $lesson->sub_title }}">
                    </div>
                    <div class="lesson_main active">
                        <label>Bài viết chính</label>
                        <select class="lesson_main_select" style="width:100%">
                            <option value="0"> Chọn bài viết chính </option>
                            @foreach ($lesson_list as $lesson_list_item)
                                <option value="{{ $lesson_list_item->id }}"
                                    {{ intval($lesson->parent) === intval($lesson_list_item->id) ? 'selected' : '' }}>
                                    {{ $lesson_list_item->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lesson_content">
                        @foreach ($lesson_detail as $item)
                            <div class="lesson_content_form" type="{{ $item->type }}" id="{{ $item->id }}"
                                code="{{ $item->p_language_id }}">
                                <div class="lesson_content_form_info">
                                    <input type="text" class="form-control lesson_content_form_title" style="color: #fff"
                                        placeholder="Tiêu đề" value="{{ $item->title }}">
                                    <select class="lesson_content_form_select">
                                        @if (!is_null($item->p_language_id))
                                            @foreach ($course_list as $course)
                                                <option value="{{ $course->name }}"
                                                    {{ $item->p_language_id == $course->name ? ' selected' : '' }}>
                                                    {{ $course->full_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="lesson_content_form_type {{ $item->compiler == 0 ? 'not_run' : '' }}">
                                        {{ is_null($item->p_language_id) ? 'text' : $item->p_language_id }}</div>
                                    <button class="lesson_content_form_remove_btn btn btn-danger btn-fw"> Xóa </button>
                                </div>
                                @if ($item->type === 'text')
                                    <textarea id="text-{{ $item->id }}" name="description">{{ $item->content }}</textarea>
                                @else
                                    <div class="lesson_card" id="{{ $item->p_language_id . $item->id }}"
                                        value="{{ $item->content }}" lang="{{ $item->p_language_id }}"></div>
                                @endif
                            </div>
                        @endforeach
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
 