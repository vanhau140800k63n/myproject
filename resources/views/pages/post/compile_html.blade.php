<!doctype html>
<html lang="en" data-wf-domain="circle-website.webflow.io" data-wf-page="61ee93d45d7f5743a65b8815"
    data-wf-site="61e57244c283e5456130c457">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div class="contact-us">
        <form>
            <input placeholder="Name" required="" type="text" /><input name="customerEmail" placeholder="Email"
                type="email" /><input name="customerPhone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone"
                type="tel" /><button type="button">SIGN UP</button>
        </form>
    </div>
    <style>
    </style>
    <script type="text/javascript">
        var text = ` @import url("https://fonts.googleapis.com/css?family=Fjalla+One&display=swap");
            * {
                margin: 0;
                padding: 0;
            }

            body {
                background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-2210775-jpeg.jpg") center center no-repeat;
                background-size: cover;
                width: 100vw;
                height: 100vh;
                display: grid;
                align-items: center;
                justify-items: center;
            }

            .contact-us {
                background: #f8f4e5;
                padding: 50px 100px;
                border: 2px solid black;
                box-shadow: 15px 15px 1px #ffa580, 15px 15px 1px 2px black;
            }

            input {
                display: block;
                width: 100%;
                font-size: 14pt;
                line-height: 28pt;
                font-family: "Fjalla One";
                margin-bottom: 28pt;
                border: none;
                border-bottom: 5px solid black;
                background: #f8f4e5;
                min-width: 250px;
                padding-left: 5px;
                outline: none;
                color: black;
            }

            input:focus {
                border-bottom: 5px solid #ffa580;
            }

            button {
                display: block;
                margin: 0 auto;
                line-height: 28pt;
                padding: 0 20px;
                background: #ffa580;
                letter-spacing: 2px;
                transition: 0.2s all ease-in-out;
                outline: none;
                border: 1px solid black;
                box-shadow: 3px 3px 1px 1px #95a4ff, 3px 3px 1px 2px black;
            }

            button:hover {
                background: black;
                color: white;
                border: 1px solid black;
            }

            ::selection {
                background: #ffc8ff;
            }

            input:-webkit-autofill,
            input:-webkit-autofill:hover,
            input:-webkit-autofill:focus {
                border-bottom: 5px solid #95a4ff;
                -webkit-text-fill-color: #2A293E;
                -webkit-box-shadow: 0 0 0px 1000px #f8f4e5 inset;
                transition: background-color 5000s ease-in-out 0s;
            }`;
        var index = 0;
        setInterval(function () {
                if (index == text.length) {
                    clearInterval(this);
                } else {
                    $('style').append(text.charAt(index));        
                }
                ++index;
            }, 10);
    </script>
</body>

</html>
