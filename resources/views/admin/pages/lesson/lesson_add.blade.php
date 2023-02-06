@extends('admin.master')
@section('head')
    <title> Thêm bài giảng | Devsne</title>
@endsection
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div>
                <button>
                    Lưu
                </button>
            </div>
            <div>
                <div class="form_lesson_info">
                    <div class="custom-select" style="width:200px;">
                        <select>
                            <option value="0">Chọn khóa học:</option>
                            @foreach ($course_list as $course)
                                <option value="{{ $course->id }}">{{ $course->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input>
                </div>
                <div class="test">
                </div>
                <button class="add_test">add</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('lib/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
@endsection
