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

$('.lesson_btn_save').click(function () {
    let course_id = $('.course_select').val();
    if (course_id == 0) {
        $('.lesson_save_error').css('opacity', 1);
        setTimeout(() => {
            $('.lesson_save_error').css('opacity', 0);
        }, 2000);
        return false;
    }

    let main_title = $('.main_title').val();
    let sub_title = $('.sub_title').val();

    let _token = $('input[name="_token"]').val();
    $.ajax({
        url: "http://localhost:8003/admin/course/lesson/add_lesson_info",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        type: "POST",
        dataType: 'json',
        data: {
            course_id: course_id,
            main_title: main_title,
            sub_title: sub_title,
            _token: _token
        }
    }).done(function (data) {
        let lesson_id = data.id;
        if ($('.lesson_content_form').length == 0) {
            location.href = 'http://localhost:8003/admin/course';
            return false;
        }
        $('.lesson_content_form').each(function () {
            if ($(this).attr('type') == 'text') {
                let id = $(this).find('textarea').attr('id');
                let content = tinyMCE.get(id).getContent();
                let title_content_item = $(this).find('.lesson_content_form_title').val();

                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "http://localhost:8003/admin/course/lesson/add_lesson_info",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    type: "POST",
                    dataType: 'json',
                    data: {
                        content: content,
                        title: title_content_item,
                        type: 'text',
                        index: $(this).attr('index'),
                        _token: _token
                    }
                }).done(function (data) {
                   
                }).fail(function (e) {
                    return false;
                });
            }
        })
    }).fail(function (e) {
        alert(1);
        return false;
    });

})

$('.lesson_content_btn_add').click(function () {
    let form_number = $('.lesson_content_form').length;
    let val = $('.lesson_content_select').val();
    let text_rand = generateId(4);

    if (val == 0) {
        return false;
    } else if (val == 'text') {
        $('.lesson_content').html($('.lesson_content').html() + '<div class="lesson_content_form" index="' + form_number + '" type="text"><input type="text" class="form-control lesson_content_form_title" style="color: #fff" placeholder="Tiêu đề"><textarea id="text' + text_rand + '" name="description"></textarea></div>');
        tinymce.init({
            selector: 'textarea#text' + text_rand,
            plugins: 'code table lists image',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | forecolor backcolor | image',
            images_file_types: 'jpg,svg,webp',
        });
    } else {
        $('.lesson_content').html($('.lesson_content').html() + '<div class="lesson_content_form" index="' + form_number + '" type="code"><input type="text" class="form-control lesson_content_form_title" style="color: #fff" placeholder="Tiêu đề"><div class="lession_card" id="' + val + text_rand + '"></div></div>');
        let view = new EditorView({
            extensions: [basicSetup, oneDark, language_list[val]],
            parent: document.querySelector(".lession_card#" + val + text_rand),
            doc: ''
        })
    }
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