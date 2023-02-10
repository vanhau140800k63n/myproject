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

let view = {}

$('.home_lession_card').each(function () {
    let language = $(this).attr('id');
    let text = $('#input_' + language).val();
    text = text.replaceAll('\\n', '\n');

    let view = new EditorView({
        extensions: [basicSetup, oneDark, language_list[language]],
        parent: document.querySelector(".home_lession_card#" + language),
        doc: ''
    })

    let index = 0;
    setInterval(function () {
        if (index == text.length) {
            view.dispatch({
                changes: { from: 0, to: text.length, insert: '' }
            });
            index = -1;
        } else {
            let length = view.state.doc.toString().length;
            view.dispatch({
                changes: { from: length, insert: text.charAt(index) }
            });
        }
        ++index;
    }, 30);

    $(this).parent().children('.submit').click(function () {
        let content = '';
        view.state.doc.text.forEach(element => {
            if (element != null) {
                content += element + '\\n';
            } else {
                content += '\\n';
            }
        });
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: "http://localhost:8003/submit",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            type: "POST",
            dataType: 'json',
            data: {
                text: content,
                language: language,
                _token: _token
            }
        }).done(function (data) {
            console.log(data);
            return true;
        }).fail(function (e) {
            return false;
        });
    })

    $(this).parent().children('.home_lession_info').css('background', $('#input_' + language).attr('color'));
})

$('.lesson_box_content .lesson_content').each(function () {
    if ($(this).find('.lession_card').length > 0) {
        $(this).find('.lesson_content_head').append('<button class="run_code"> Run code </button>');
        $(this).addClass('code_box');
        let lesson_cart = $(this).find('.lession_card');
        let content = lesson_cart.attr('value').replaceAll('\\n', '\n');
        let val = lesson_cart.attr('lang');

        view[lesson_cart.attr('id')] = new EditorView({
            extensions: [basicSetup, oneDark, language_list[val]],
            parent: document.querySelector(".lession_card#" + lesson_cart.attr('id')),
            doc: content
        })
    }
})

const originalLog = console.log;

console.log = function (...value) {
    originalLog.apply(console, value);
    return value;
};

$('.run_code').click(function () {
    let code_editer = $(this).parent().parent().find('.lession_card');
    let lang = code_editer.attr('lang');
    let content = view[code_editer.attr('id')].state.doc.toString();
    if (lang == 'php') {
        content = content.replace('<?php', '');

        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: "http://localhost:8003/build_code_php",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            type: "POST",
            dataType: 'json',
            data: {
                content: content,
                _token: _token
            }
        }).done(function (data) {
            $('#compiler' + code_editer.attr('id')).html(data);
            return true;
        }).fail(function (e) {
            $('#compiler' + code_editer.attr('id')).html(e.responseText);
            return false;
        });
    } else if (lang == 'js') {
        let value = '';
        try {
            value = eval(content);
        } catch (error) {
            value = error;
        }
        $('#compiler' + code_editer.attr('id')).html(value);
    } else if(lang == 'html') {
        $('#compiler' + code_editer.attr('id')).append(content);
    }
})

