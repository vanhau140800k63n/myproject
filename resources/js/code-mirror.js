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