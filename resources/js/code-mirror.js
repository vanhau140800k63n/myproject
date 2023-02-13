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
    } else {
        $(this).addClass('html_box');
    }
})

const originalLog = console.log;

console.log = function (...value) {
    originalLog.apply(console, value);
    return value;
};

$('.run_code').click(function () {
    let compiler_code_loading = $(this).parent().parent().find('.lds-ring');
    compiler_code_loading.show();
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
            compiler_code_loading.hide();
            return true;
        }).fail(function (e) {
            $('#compiler' + code_editer.attr('id')).html(e.responseText);
            compiler_code_loading.hide();
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
        compiler_code_loading.hide();
    } else if (lang == 'html') {
        $('#html' + code_editer.attr('id')).html('');
        $('#html' + code_editer.attr('id')).append(content);
        compiler_code_loading.hide();
    } else if (lang == 'java') {
        $('#compiler' + code_editer.attr('id')).html('');

        let myHeaders = new Headers();
        myHeaders.append("Host", "sandbox.jsweet.org");
        myHeaders.append("sec-ch-ua", "\"Not_A Brand\";v=\"99\", \"Google Chrome\";v=\"109\", \"Chromium\";v=\"109\"");
        myHeaders.append("sec-ch-ua-platform", "\"Android\"");
        myHeaders.append("sec-ch-ua-mobile", "?1");
        myHeaders.append("User-Agent", "Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36");
        myHeaders.append("Accept", "*/*");
        myHeaders.append("Origin", "https://sandbox.jsweet.org");
        myHeaders.append("Sec-Fetch-Site", "same-origin");
        myHeaders.append("Sec-Fetch-Mode", "cors");
        myHeaders.append("Sec-Fetch-Dest", "empty");
        myHeaders.append("Referer", "https://sandbox.jsweet.org/");
        myHeaders.append("Accept-Language", "en-US,en;q=0.9,vi;q=0.8,ja;q=0.7");
        myHeaders.append("Cookie", "_ga=GA1.2.726974715.1671703357; _gid=GA1.2.957726084.1676083267");

        let formdata = new FormData();
        content = content.replaceAll('System.out.println(', 'System.out.println("<br>" + ');
        formdata.append("javaCode", content);

        let requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: formdata,
            redirect: 'follow'
        };

        fetch("https://sandbox.jsweet.org/transpile", requestOptions)
            .then(response => response.json())
            .then(result => {
                if (result.jsout != "") {
                    result = result.jsout;
                    while (result.indexOf("console.info(\"<br>") > -1) {
                        let index = result.indexOf("console.info(\"<br>");
                        let last_index_str_print = result.indexOf(");\n", index);
                        result = result.substring(0, last_index_str_print) + ' + "<br>");\n' + result.substring(last_index_str_print + 3);
                        result = result.replace("console.info(\"<br>", "$('#compiler" + code_editer.attr('id') + "').append(\"");
                    }
                    result = result.replaceAll("console.info(", "$('#compiler" + code_editer.attr('id') + "').append(");
                    result = result.replaceAll(").append(\"\" +", ").append(");
                    $('#compiler' + code_editer.attr('id')).append("<script>\n" + result + "\n</script>");
                    compiler_code_loading.hide();
                } else if (result.errors != []) {
                    let content_java = '';
                    result.errors.forEach(element => {
                        content_java += element + '<br>';
                    });
                    $('#compiler' + code_editer.attr('id')).html(content_java);
                    compiler_code_loading.hide();
                }
            }).catch(error => console.log('error', error));
    } else if (lang == 'cpp') {
        $('#compiler' + code_editer.attr('id')).html('');
        let JSCPP = require("JSCPP");
        var code = content;
        var input = "";
        var output = "";
        var config = {
            stdio: {
                write: function (s) {
                    output += s;
                }
            }
        };
        try {
            let exitCode = JSCPP.run(code, input, config);
            output = output.replaceAll(' ', '&nbsp;');
            output = output.replaceAll('\n', '<br>');
            $('#compiler' + code_editer.attr('id')).append(output);
            compiler_code_loading.hide();
        } catch (error) {
            $('#compiler' + code_editer.attr('id')).append(error);
            compiler_code_loading.hide();
        }
    }
})

