import { EditorView, basicSetup } from "codemirror"
import { javascript } from "@codemirror/lang-javascript"
import { php } from "@codemirror/lang-php"
import { python } from "@codemirror/lang-python"
import { oneDark } from '@codemirror/theme-one-dark'
import { java } from "@codemirror/lang-java"
import { html } from "@codemirror/lang-html"
import { cpp } from "@codemirror/lang-cpp"

let language_list = {
    php: php(),
    js: javascript(),
    py: python(),
    java: java(),
    html: html(),
    cpp: cpp()
}

var view = {};

$('.lesson_btn_save').click(function () {
    let course_id = $('.course_select').val();
    if (course_id == 0) {
        $('.lesson_save_alert').css('background-color', '#dd4545');
        $('.lesson_save_alert').html('Vui lòng chọn khóa học');
        $('.lesson_save_alert').css('opacity', 1);
        setTimeout(() => {
            $('.lesson_save_alert').css('opacity', 0);
        }, 2000);
        return false;
    }

    let lesson_content_form_length = $('.lesson_content_form').length;
    if (lesson_content_form_length == 0) {
        $('.lesson_save_alert').css('background-color', '#dd4545');
        $('.lesson_save_alert').html('Vui lòng thêm nội dung');
        $('.lesson_save_alert').css('opacity', 1);
        setTimeout(() => {
            $('.lesson_save_alert').css('opacity', 0);
        }, 2000);
        return false;
    }

    let main_title = $('.main_title').val();
    let sub_title = $('.sub_title').val();
    let _token = $('input[name="_token"]').val();
    let url = '';
    let data = {};
    let lesson_id = $('.lesson_info').attr('lesson_id');

    if ($('.lesson_info').attr('type') == 'add') {
        url = "http://localhost:8003/admin/course/lesson/add_lesson_info";
        data = {
            course_id: course_id,
            main_title: main_title,
            sub_title: sub_title,
            _token: _token
        };
    } else {
        url = "http://localhost:8003/admin/course/lesson/update_lesson_info";
        data = {
            id: lesson_id,
            course_id: course_id,
            main_title: main_title,
            sub_title: sub_title,
            _token: _token
        };
    }

    $.ajax({
        url: url,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        type: "POST",
        dataType: 'json',
        data: data
    }).done(function (data) {
        if (data.id != undefined) {
            lesson_id = data.id;
        }

        let index_form = 0;
        $('.lesson_content_form').each(function () {
            let index = $('.lesson_content_form').index($(this));
            let title_content_item = $(this).find('.lesson_content_form_title').val();
            let type = $(this).attr('type');
            let content = '';
            let code = '';
            let url_item = '';
            let data_item = {};

            if (type == 'text') {
                let id = $(this).find('textarea').attr('id');
                content = tinyMCE.get(id).getContent();
            } else {
                content = '';
                code = $(this).attr('code');
                view[$(this).attr('id')].state.doc.text.forEach(element => {
                    if (element != null) {
                        content += element + '\\n';
                    } else {
                        content += '\\n';
                    }
                });

                content = content.slice(0, -2);
            }
            let _token = $('input[name="_token"]').val();
            if ($(this).attr('status') == 'new') {
                url_item = "http://localhost:8003/admin/course/lesson/add_lesson_item";
                data_item = {
                    content: content,
                    title: title_content_item,
                    type: type,
                    index: index,
                    lesson_id: lesson_id,
                    code: code,
                    _token: _token
                };
            } else {
                url_item = "http://localhost:8003/admin/course/lesson/update_lesson_item";
                data_item = {
                    id: $(this).attr('id'),
                    content: content,
                    title: title_content_item,
                    type: type,
                    index: index,
                    lesson_id: lesson_id,
                    code: code,
                    _token: _token
                };
            }

            $.ajax({
                url: url_item,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                type: "POST",
                dataType: 'json',
                data: data_item
            }).done(function (data) {
                ++index_form;
                if (index_form == lesson_content_form_length) {
                    if ($('.lesson_info').attr('type') == 'add') {
                        location.href = 'http://localhost:8003/admin/course';
                        return false;
                    }
                    $('.lesson_save_alert').css('background-color', '#4CAF50');
                    $('.lesson_save_alert').html('Lưu thành công');
                    $('.lesson_save_alert').css('opacity', 1);
                    setTimeout(() => {
                        $('.lesson_save_alert').css('opacity', 0);
                    }, 2000);
                }
                return false;
            }).fail(function (e) {
                return false;
            });
        })
    }).fail(function (e) {
        return false;
    });

})

$('.lesson_content_btn_add').click(function () {
    let val = $('.lesson_content_select').val();
    let text_rand = generateId(4);

    if (val == 0) {
        return false;
    } else if (val == 'text') {
        $('.lesson_content').append('<div class="lesson_content_form" type="text" status="new"><div class="lesson_content_form_info"><input type="text" class="form-control lesson_content_form_title" style="color: #fff" placeholder="Tiêu đề" status="new"><div class="lesson_content_form_type">text</div><button class="lesson_content_new_form_remove_btn btn btn-danger btn-fw"> Xóa </button></div><textarea id="text' + text_rand + '" name="description"></textarea></div>');
        tinymce.init({
            selector: 'textarea#text' + text_rand,
            plugins: 'code table lists image',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | forecolor backcolor | image',
            images_file_types: 'jpg,svg,webp',
        });
    } else {
        $('.lesson_content').append('<div class="lesson_content_form" type="code" id="' + text_rand + '" code="' + val + '" status="new"><div class="lesson_content_form_info"><input type="text" class="form-control lesson_content_form_title" style="color: #fff" placeholder="Tiêu đề" status="new"><div class="lesson_content_form_type">' + val + '</div><button class="lesson_content_new_form_remove_btn btn btn-danger btn-fw"> Xóa </button></div><div class="lession_card" id="' + val + text_rand + '"></div></div>');
        view[text_rand] = new EditorView({
            extensions: [basicSetup, oneDark, language_list[val]],
            parent: document.querySelector(".lession_card#" + val + text_rand),
            doc: ''
        })
    }

    $('.lesson_content_new_form_remove_btn').click(function () {
        $(this).parent().parent().remove();
    })
})

$('.lesson_content_form').each(function () {
    let type = $(this).attr('type');
    let id = $(this).attr('id');

    if (type == 'text') {
        tinymce.init({
            selector: 'textarea#text-' + id,
            plugins: 'code table lists image',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | forecolor backcolor | image',
            images_file_types: 'jpg,svg,webp',
        });
    } else {
        let content = $(this).find('.lession_card').attr('value').replaceAll('\\n', '\n');
        let val = $(this).attr('code');
        view[id] = new EditorView({
            extensions: [basicSetup, oneDark, language_list[val]],
            parent: document.querySelector(".lession_card#" + val + id),
            doc: content
        })
    }
})

$('.lesson_content_form_remove_btn').click(function () {
    let lesson_form = $(this).parent().parent();
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url: "http://localhost:8003/admin/course/lesson/del_lesson_item",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        type: "POST",
        dataType: 'json',
        data: {
            id: lesson_form.attr('id'),
            _token: _token
        }
    }).done(function (data) {
        lesson_form.remove();
        return true;
    }).fail(function (e) {
        return false;
    });
})

function dec2hex(dec) {
    return dec.toString(16).padStart(2, "0")
}

// generateId :: Integer -> String
function generateId(len) {
    var arr = new Uint8Array((len || 40) / 2)
    window.crypto.getRandomValues(arr)
    return Array.from(arr, dec2hex).join('')
}