<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfoRequest extends FormRequest
{
    public function rules()
    {
        return [
            "avata" => "file|mimes:png,jpg,jpeg|max:5120",
            "first_name" => "required|max:100",
            "last_name" => "required|max:100",
        ];
    }

    public function messages()
    {
        return [
            "avata.file" => 'File không đúng định dạng',
            "avata.mimes" => 'File không thuộc png, jpg',
            "avata.max" => 'File lớn hơn 5MB',
            "first_name.required" => 'Thiếu thông tin người dùng',
            "first_name.max" => 'Tên quá dài',
            "last_name.required" => 'Thiếu thông tin người dùng',
            "last_name.max" => 'Tên quá dài',
        ];
    }
}
