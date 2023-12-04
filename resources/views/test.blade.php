@extends('layouts.master')
@section('head')
@endsection
@section('content')
    <div class="container">

        <div class="mobile-layout">
            <div class="notification-header">
                <div class="necessities">
                    <i class="fas fa-signal"></i>
                    <i class="fas fa-wifi"></i>
                    <i class="fas fa-battery-full"></i>
                </div>
            </div>
            <div class="book-cover">
                <div class="book-top">
                    {{-- <img class="book-top-img"
                        src="https://scontent.fhan14-4.fna.fbcdn.net/v/t1.15752-9/393213770_359836526635380_9123241382885958695_n.png?_nc_cat=102&ccb=1-7&_nc_sid=8cd0a2&_nc_ohc=fcUlHcEb0YEAX8W0Mx0&_nc_ht=scontent.fhan14-4.fna&oh=03_AdT5ycd_jPK8HzUdcf2aIQeJNhaODWd9mjXhWEWAxSJAhQ&oe=659554C5"> --}}
                </div>
                <img class="book-side"
                    src="https://raw.githubusercontent.com/atomic-variable/images-repo/e37f432405904a280858e5437ce1960753bc78a3/book-side.svg"
                    alt="book-side" />
            </div>
            <div class="preface">
                <div class="content">
                    <div class="stack">
                        <div class="imagewrap">
                            <img src="https://scontent.fhan14-4.fna.fbcdn.net/v/t39.30808-6/273180030_1381650492290647_7014516994154635968_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=dd5e9f&_nc_ohc=R1AVjvvyz5kAX_Q5KSU&_nc_ht=scontent.fhan14-4.fna&oh=00_AfBlbzUf7Lczh2ZuyV7SEUQE3w8NINCJPkoJf-s-VMXvdA&oe=6572A512"
                                class="confirmed" />
                        </div>
                        <div class="imagewrap">
                            <img src="https://scontent.fhan14-1.fna.fbcdn.net/v/t39.30808-6/327018698_443702357881665_5887035517073173010_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=dd5e9f&_nc_ohc=9Se5iCrPleoAX8efz3_&_nc_ht=scontent.fhan14-1.fna&oh=00_AfAHVsMd-npxu8RPeXvc6bD3iXuMfp7vls3Veh5CfyFbJg&oe=65727227"
                                class="confirmed" />
                        </div>
                        <div class="imagewrap">
                            <img src="https://scontent.fhan14-3.fna.fbcdn.net/v/t39.30808-6/273039292_1381650782290618_3495448616308663676_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=dd5e9f&_nc_ohc=FzmxyKOvOfsAX_imMjQ&_nc_ht=scontent.fhan14-3.fna&oh=00_AfASzQ_YeZpo7mekWnWTJhhdEPQCefRsPPfzDiEmhSMOuQ&oe=657376CF"
                                class="confirmed" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .body_image {
            width: 200px;
        }

        .book-top-img {
            width: 55px;
            float: right;
            margin-top: 80px;
            margin-right: 20px;
        }

        :root {
            --mobile-width: 325px;
            --mobile-height: 670px;
            --mobile-radius: 25px;
            --separator-height: 500px;
            --bg: #fdf3f2;
            --mobile-bg: #fdeae6;
            --intro-bg: #eed7d1;
            --font-color: #807b7b;
            --transition: transform 0.7s ease-in-out;
        }

        .container {
            /* min-height: 100vh; */
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: var(--bg);
        }

        .info {
            font-family: "Quicksand", sans-serif;
            font-family: "Open Sans", sans-serif;
            font-style: italic;
            font-size: 26px;
            margin-top: 10px;
            color: var(--font-color);
        }

        .mobile-layout {
            width: var(--mobile-width);
            height: var(--mobile-height);
            margin: 30px 0;
            border-radius: var(--mobile-radius);
            perspective: 500px;
            overflow: hidden;
            color: var(--font-color);
            background-color: var(--mobile-bg);
            box-shadow: 36px 36px 50px 15px #eed7d1d1;
        }

        .mobile-layout .notification-header {
            position: fixed;
            top: 5px;
            width: 100%;
            padding: 5px 15px;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            font-family: "Open Sans", sans-serif;
            font-weight: bold;
            z-index: 6;
        }

        .mobile-layout .actions {
            position: fixed;
            top: 37px;
            width: 100%;
            padding: 50px;
            display: flex;
            justify-content: space-between;
            font-size: 20px;
            z-index: 6;
        }

        .mobile-layout .book-cover {
            position: relative;
            height: var(--separator-height);
            width: calc(var(--mobile-width) * 2);
            left: -52.5%;
            border-top-left-radius: var(--mobile-radius);
            border-top-right-radius: var(--mobile-radius);
            background-color: var(--intro-bg);
            transform-style: preserve-3d;
            transform-origin: 50% 40%;
            transition: var(--transition);
            z-index: 4;
        }

        .mobile-layout .book-top {
            width: 170px;
            height: 255px;
            position: absolute;
            top: 180px;
            left: 250px;
            z-index: 5;
            transform: translateZ(28.5px);
            background-color: #857071;
            border-radius: 8px;
        }

        .mobile-layout .book-side {
            position: absolute;
            top: 430px;
            left: 222px;
            transform: translateY(-15px) translateX(0px) translateZ(15px) rotateX(104deg);
            -webkit-transform: translateY(-15px) translateX(0px) translateZ(15px) rotateX(104deg);
            -moz-transform: translateY(-15px) translateX(0px) translateZ(15px) rotateX(104deg);
            -ms-transform: translateY(-15px) translateX(0px) translateZ(15px) rotateX(104deg);
            -o-transform: translateY(-15px) translateX(0px) translateZ(15px) rotateX(104deg);
        }

        .mobile-layout .book-cover:hover {
            transform: rotateX(75deg) translateZ(3px) scale(0.75);
            -webkit-transform: rotateX(75deg) translateZ(3px) scale(0.75);
            -moz-transform: rotateX(75deg) translateZ(3px) scale(0.75);
            -ms-transform: rotateX(75deg) translateZ(3px) scale(0.75);
            -o-transform: rotateX(75deg) translateZ(3px) scale(0.75);
        }

        .mobile-layout .book-cover:hover+.preface {
            transform: translateY(-302px);
            -webkit-transform: translateY(-302px);
            -moz-transform: translateY(-302px);
            -ms-transform: translateY(-302px);
            -o-transform: translateY(-302px);
        }

        .mobile-layout .book-cover:hover+.preface .icon {
            transform: rotateX(180deg);
            -webkit-transform: rotateX(180deg);
            -moz-transform: rotateX(180deg);
            -ms-transform: rotateX(180deg);
            -o-transform: rotateX(180deg);
        }

        .mobile-layout .preface {
            height: var(--separator-height);
            transition: var(--transition);
            background: white;
        }

        .mobile-layout .preface .header {
            display: flex;
            align-items: center;
        }

        .mobile-layout .preface .title {
            font-family: "Quicksand", sans-serif;
            font-size: 26px;
            margin-bottom: 10px;
        }

        .mobile-layout .preface .author {
            font-family: "Open Sans", sans-serif;
            font-style: italic;
            margin-bottom: 20px;
        }

        .mobile-layout .preface .icon {
            transform-origin: top;
            transition: var(--transition);
        }

        .mobile-layout .preface .body {
            font-family: "Quicksand", sans-serif;
        }

        .mobile-layout .preface .body p:first-child {
            margin-bottom: 15px;
        }
    </style>
    <style>
        :root {
            --bgcolor: rgb(230, 230, 230);
            --bodybgcolor: rgb(200, 200, 200);
            --solidobject: -2px -2px 4px rgb(255, 255, 255),
                2px 2px 4px rgba(0, 0, 0, 0.15);
            --standardtrans: all 1s ease;
            --fasttrans: all 0.25s ease;
            --superfasttrans: all 0.15s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            background: var(--bodybgcolor);
            color: gray;
            font-family: "Roboto", sans-serif;
        }

        .imgwrapper,
        .imgwrapper * {
            transition: var(--standardtrans);
            outline: none !important;
        }

        .stack {
            position: relative;
            height: 250px;
        }

        .imagewrap {
            position: relative;
            margin: 30px;
            padding: 3px;
            margin-top: 50px;
            border-radius: 1.2em;
            background: var(--bgcolor);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
        }

        .stack .imagewrap {
            position: absolute;
            right: 0;
            top: 0;
            transform-origin: right top;
            transition: var(--fasttrans);
        }

        .stack .imagewrap.selected {
            right: 89% !important;
            top: -20px !important;
            transform: rotateZ(5deg) !important;
        }

        .stack .imagewrap:not(:nth-child(1)):hover {
            right: 30px;
            top: 20px;
            cursor: pointer;
        }

        .stack .imagewrap:nth-child(1) {
            z-index: 5;
            transform: rotateZ(1deg) translate(0, 0);
        }

        .stack .imagewrap:nth-child(2) {
            z-index: 4;
            transform: rotateZ(-4deg) translate(-10px, 0);
        }

        .stack .imagewrap:nth-child(3) {
            z-index: 3;
            transform: rotateZ(-6deg) translate(-5px, 20px);
        }

        .stack .imagewrap:nth-child(4) {
            z-index: 2;
            transform: rotateZ(-9deg) translate(-3px, 32px);
        }

        .stack .imagewrap:nth-child(5) {
            z-index: 1;
            transform: rotateZ(-14deg) translate(-3px, 24px);
        }

        .imagewrap img {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            min-height: 308px;
            opacity: 1;
            padding: 20px 15px;
            border-radius: 10px;
            border-top-left-radius: 0;
            box-shadow: -5px -5px 20px rgb(255, 255, 255),
                5px 5px 20px rgba(0, 0, 0, 0.15);
        }

        .imagewrap img.confirmed {
            border-top-left-radius: 1em;
            box-shadow: var(--solidobject);
        }
    </style>
    <script>
        var autorotate = true;

        function rotate(el) {
            $(".stack .imagewrap.selected").removeClass("selected");
            el.addClass("selected");
            setTimeout(function() {
                $(".stack").prepend($(".stack .imagewrap.selected"));
                setTimeout(function() {
                    $(".stack .imagewrap.selected").removeClass("selected");
                }, 200);
            }, 250);
        }

        function loadactions() {
            $("body")
                .off("click", ".stack .imagewrap:not(:first-child)")
                .on("click", ".stack .imagewrap:not(:first-child)", function() {
                    $(".stack .imagewrap.selected").removeClass("selected");
                    $(this).addClass("selected");
                    setTimeout(function() {
                        $(".stack").prepend($(".stack .imagewrap.selected"));
                        setTimeout(function() {
                            $(".stack .imagewrap.selected").removeClass("selected");
                        }, 200);
                    }, 250);
                });
        }

        $(function() {
            loadactions();
            if (autorotate == true) {
                setInterval(function() {
                    rotate($(".stack .imagewrap:last-child"));
                }, 1500);
            }
        });
    </script>
@endsection
