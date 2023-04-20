<!doctype html>
<html lang="en" data-wf-domain="circle-website.webflow.io" data-wf-page="61ee93d45d7f5743a65b8815"
    data-wf-site="61e57244c283e5456130c457">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('image/logo2.png') }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/assets/jquery.min.js') }}"></script>
    <?php
    header('Access-Control-Allow-Origin: *');
    ?>
</head>

<body>
    <style>
    </style>
    <script type="text/javascript">
        var text = `{!! $text !!}`;
        var text_head = text.substring(text.indexOf('<head>') + 6, text.indexOf('</head>'));
        var text_body = text.substring(text.indexOf('<body>') + 6, text.indexOf('</body>'));
        var text_style = text.substring(text.indexOf('<style>') + 7, text.indexOf('</style>'));

        $('head').append(text_head);
        $('body').prepend(text_body);

        var index = 0;
        setInterval(function() {
            if (index == text_body.length) {
                clearInterval(this);
                var index = 0;
                setInterval(function() {
                    if (index == text_style.length) {
                        clearInterval(this);
                    } else {
                        $('style').append(text_style.charAt(index));
                    }
                    ++index;
                }, 10);
            } else {
                $('body').append(text_body.charAt(index));
            }
            ++index;
        }, 10);
    </script>
</body>

</html>
