import { EditorView, basicSetup } from "codemirror"
import { javascript } from "@codemirror/lang-javascript"
import { php } from "@codemirror/lang-php"
import { python } from "@codemirror/lang-python"
import { oneDark } from '@codemirror/theme-one-dark'
import { java } from "@codemirror/lang-java"
import { html } from "@codemirror/lang-html"
import { cpp } from "@codemirror/lang-cpp"

$(document).ready(() => {
    var domain = 'http://localhost:8003/';
    // var domain = 'https://devsne.vn/';

    let language_list = {
        php: php(),
        js: javascript(),
        py: python(),
        java: java(),
        html: html(),
        cpp: cpp()
    }

    var view = {};

    $('.post_btn_save').click(function () {
        let post_type = $('.post_type_select').val();
        if (post_type == 0) {
            $('.post_save_alert').css('background-color', '#dd4545');
            $('.post_save_alert').html('Vui lòng loại bài viết');
            $('.post_save_alert').css('opacity', 1);
            setTimeout(() => {
                $('.post_save_alert').css('opacity', 0);
            }, 2000);
            return false;
        }

        let post_content_form_length = $('.post_content_form').length;
        if (post_content_form_length == 0) {
            $('.post_save_alert').css('background-color', '#dd4545');
            $('.post_save_alert').html('Vui lòng thêm nội dung');
            $('.post_save_alert').css('opacity', 1);
            setTimeout(() => {
                $('.post_save_alert').css('opacity', 0);
            }, 2000);
            return false;
        }

        let title = $('.post_title').val();
        let _token = $('input[name="_token"]').val();
        let url = '';
        let data = {};
        let post_id = $('.post_info').attr('post_id');

        if ($('.post_info').attr('type') == 'add') {
            url = domain + "admin/post/add_post_info";
            data = {
                title: title,
                type: post_type,
                _token: _token
            };
        } else {
            url = domain + "admin/post/update_post_info";
            data = {
                id: post_id,
                title: title,
                type: post_type,
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
                post_id = data.id;
            }

            let index_form = 0;
            $('.post_content_form').each(function () {
                let index = $('.post_content_form').index($(this));
                let title_content_item = $(this).find('.post_content_form_title').val();
                let type = $(this).attr('type');
                let content = '';
                let code = '';
                let url_item = '';
                let data_item = {};
                let form_type = $(this).find('.post_content_form_type');
                let compiler = 1;
                if (form_type.hasClass('not_run')) {
                    compiler = 0;
                }

                if (type == 'text') {
                    let id = $(this).find('textarea').attr('id');
                    content = tinyMCE.get(id).getContent();
                } else {
                    code = $(this).attr('code');
                    content = view[$(this).attr('id')].state.doc.toString();
                }
                let _token = $('input[name="_token"]').val();
                let is_new_content = ($(this).attr('status') == 'new');
                if (is_new_content) {
                    url_item = domain + "admin/post/add_post_item";
                    data_item = {
                        content: content,
                        title: title_content_item,
                        type: type,
                        index: index,
                        post_id: post_id,
                        code: code,
                        compiler: compiler,
                        _token: _token
                    };
                } else {
                    url_item = domain + "admin/post/update_post_item";
                    data_item = {
                        id: $(this).attr('id'),
                        content: content,
                        title: title_content_item,
                        type: type,
                        index: index,
                        post_id: post_id,
                        code: code,
                        compiler: compiler,
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
                    if (index_form == post_content_form_length) {
                        if ($('.post_info').attr('type') == 'add') {
                            location.href = domain + 'admin/post';
                        } else {
                            location.reload();
                        }
                        $('.post_save_alert').css('background-color', '#4CAF50');
                        $('.post_save_alert').html('Lưu thành công');
                        $('.post_save_alert').css('opacity', 1);
                        setTimeout(() => {
                            $('.post_save_alert').css('opacity', 0);
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

    $('.post_content_btn_add').click(function () {
        let val = $('.post_content_select').val();
        let text_rand = generateId(4);

        if (val == 0) {
            return false;
        } else if (val == 'text') {
            $('.post_content').append('<div class="post_content_form" type="text" status="new"><div class="post_content_form_info"><input type="text" class="form-control post_content_form_title" style="color: #fff" placeholder="Tiêu đề" status="new"><div class="post_content_form_type">text</div><button class="post_content_new_form_remove_btn btn btn-danger btn-fw"> Xóa </button></div><textarea id="text' + text_rand + '" name="description"></textarea></div>');
            tinymce.init({
                selector: 'textarea#text' + text_rand,
                plugins: 'code table lists image',
                toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | forecolor backcolor | image',
                images_file_types: 'jpg,svg,webp',
            });
        } else {
            $('.post_content').append('<div class="post_content_form" type="code" id="' + text_rand + '" code="' + val + '" status="new"><div class="post_content_form_info"><input type="text" class="form-control post_content_form_title" style="color: #fff" placeholder="Tiêu đề" status="new"><div class="post_content_form_type">' + val + '</div><button class="post_content_new_form_remove_btn btn btn-danger btn-fw"> Xóa </button></div><div class="post_card" id="' + val + text_rand + '"></div></div>');
            view[text_rand] = new EditorView({
                extensions: [basicSetup, oneDark, language_list[val]],
                parent: document.querySelector(".post_card#" + val + text_rand),
                doc: ''
            })
        }

        $('.post_content_new_form_remove_btn').click(function () {
            $(this).parent().parent().remove();
        })
    })

    $('.post_content_form').each(function () {
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
            let content = $(this).find('.post_card').attr('value').replaceAll('\\n', '\n');
            let val = $(this).attr('code');
            view[id] = new EditorView({
                extensions: [basicSetup, oneDark, language_list[val]],
                parent: document.querySelector(".post_card#" + val + id),
                doc: content
            })
        }
    })

    $('.post_content_form_remove_btn').click(function () {
        let post_form = $(this).parent().parent();
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: domain + "admin/post/del_post_item",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            type: "POST",
            dataType: 'json',
            data: {
                id: post_form.attr('id'),
                _token: _token
            }
        }).done(function (data) {
            post_form.remove();
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

    $('.post_content_form_type').click(function () {
        if ($(this).hasClass('not_run')) {
            $(this).removeClass('not_run');
        } else {
            $(this).addClass('not_run');
        }
    })
})