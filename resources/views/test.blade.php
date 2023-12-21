@extends('layouts.master')
@section('head')
@endsection
@section('content')
    <section class="container">

        <!--==================== Poll UI ====================-->

        <section class="et__cards-container">

            <!--==================== POLL UI ====================-->
            <div class="et__box--wrapper">
                <header>Món quà giá trị nhất </header>
                <div class="et__poll--area">
                    @foreach ($json_data as $name => $count)
                        <label for="" class="et__box">
                            <div class="et__row">
                                <div class="et__column">
                                    <span class="et__circle"></span>
                                    <span class="et__title">{{ $name }}</span>
                                </div>
                                <span class="et__percent">{{ $json_data[$name] }}</span>
                            </div>
                            <div class="et__progress" style="--w:{{ $json_data[$name] }};"></div>
                        </label>
                    @endforeach
                    <button class="save"> Lưu lại</button>
                </div>
            </div>
        </section>
    </section>
    <script>
        // getting all attributes
        const options = document.querySelectorAll(".et__box"),
            etProgressBar = document.querySelector(".et__percent");

        for (let i = 0; i < options.length; i++) {
            @if ($check == true)
                options[i].classList.add("et__selected");
                options[i].classList.add("et__selectedAll");
            @endif
            options[i].addEventListener("click", () => {
                for (let j = 0; j < options.length; j++) {
                    if (options[j].classList.contains("et__selected")) {
                        options[j].classList.remove("et__selected");
                    }
                }
                options[i].classList.add("et__selected");
                for (let k = 0; k < options.length; k++) {
                    options[i].classList.add("et__selectedAll");
                }
            });
        }
        $('.save').click(function() {
            if ($('.et__selected').length == 0) {
                return false;
            }
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: window.location.origin + "/update_test",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                type: "POST",
                dataType: 'json',
                data: {
                    key: $('.et__selected').find('.et__title').html(),
                    _token: _token
                }
            }).done(function(data) {
                location.reload();
                return true;
            }).fail(function(e) {
                return false;
            });
        })
    </script>
    <style>
        :root {
            --text-color: #000000;
            --bg-color: #ffffff;
            --body-font: "Lato", sans-serif;
            --normal-font-size: 0.938rem;
        }

        @media screen and (min-width: 968px) {
            :root {
                --normal-font-size: 1rem;
            }
        }

        *,
        *:after,
        *:before {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .save {
            margin-top: 20px;
            width: 100%;
            padding: 10px 0;
            background: #000000;
            color: #fff;
            font-size: 20px;
            border: none;
        }

        body {
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            background-color: var(--bg-color);
            color: var(--text-color);
            font-weight: bold;
        }

        /*==================== REUSABLE CSS CLASSES ====================*/
        .container {
            margin: 0 auto;
            min-height: 100vh;
        }

        .et__cards-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            padding: 100px 0;
            background-color: #000000;
        }

        /*==================== POLL UI ====================*/
        .et__box--wrapper {
            --clr-primary: #000000;
            --clr-bg-light: #ffffff;
            --clr-gray-100: #cccccc;
            --clr-gray-200: #e6e6e6;
            --clr-gray-300: #f0f0f0;
            --linear-gradient: linear-gradient(45deg,
                    rgba(255, 255, 255, 0.25) 25%,
                    transparent 25%,
                    transparent 50%,
                    rgba(255, 255, 255, 0.25) 50%,
                    rgba(255, 255, 255, 0.25) 75%,
                    transparent 75%,
                    transparent);

            width: 100%;
            max-width: 380px;
            padding: 25px;
            border-radius: 15px;
            background-color: var(--clr-bg-light);
        }

        .et__box--wrapper header {
            font-size: 22px;
            font-weight: 700;
        }

        .et__box--wrapper .et__poll--area {
            margin: 20px 0 15px;
        }

        .et__poll--area .et__box {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
            cursor: pointer;
            border: 2px solid var(--clr-gray-200);
            transition: all 0.2s ease;
        }

        .et__poll--area .et__box:hover {
            border-color: var(--clr-primary);
        }

        .et__poll--area .et__box.et__selected {
            border-color: var(--clr-primary);
        }

        .et__poll--area .et__box .et__row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 1;
        }

        .et__poll--area .et__box .et__row .et__column {
            display: flex;
            align-items: center;
        }

        .et__poll--area .et__box .et__row .et__circle {
            display: block;
            height: 19px;
            width: 19px;
            margin-right: 10px;
            border-radius: 50%;
            position: relative;
            border: 2px solid var(--clr-gray-100);
        }

        .et__poll--area .et__box.et__selected .et__row .et__circle {
            border-color: var(--clr-primary);
        }

        .et__poll--area .et__box .et__row .et__circle::after {
            display: none;
            content: "";
            height: 11px;
            width: 11px;
            border-radius: inherit;
            position: absolute;
            top: 2px;
            left: 2px;
            background-image: var(--linear-gradient);
            background-size: 0.5rem 0.5rem;
            animation: etProgressBarStripes 1s linear infinite;
            background-color: var(--clr-gray-100);
        }

        .et__poll--area .et__box:hover .et__row .et__circle::after {
            display: block;
            background-color: var(--clr-gray-200);
        }

        .et__poll--area .et__box.et__selected .et__row .et__circle::after {
            display: block;
            background-color: var(--clr-primary);
        }

        .et__poll--area .et__box .et__row span {
            font-size: 16px;
            font-weight: 400;
        }

        .et__poll--area .et__box .et__percent {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .et__poll--area .et__box.et__selectedAll .et__percent {
            visibility: visible;
            opacity: 1;
        }

        .et__poll--area .et__box .et__progress {
            height: 0px;
            width: 100%;
            position: relative;
            border-radius: 30px;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.5s ease;
            background-color: var(--clr-gray-300);
        }

        .et__poll--area .et__box .et__progress::after {
            content: "";
            height: 100%;
            width: 0;
            border-radius: inherit;
            position: absolute;
            background-color: var(--clr-gray-100);
            background-image: var(--linear-gradient);
            background-size: 1rem 1rem;
            animation: etProgressBarStripes 1s linear infinite;
            transition: width 0.5s ease;
        }

        .et__poll--area .et__box.et__selectedAll .et__progress {
            height: 7px;
            margin: 8px 0 3px;
            visibility: visible;
            opacity: 1;
        }

        .et__poll--area .et__box.et__selected .et__progress::after {
            width: calc(1% * var(--w));
            background-color: var(--clr-primary);
        }

        @-webkit-keyframes etProgressBarStripes {
            from {
                background-position: 55px 0;
            }

            to {
                background-position: 0 0;
            }
        }

        @keyframes etProgressBarStripes {
            from {
                background-position: 55px 0;
            }

            to {
                background-position: 0 0;
            }
        }

        /*==================== MEDIA QUERIES ====================*/

        /* For small devices */
        @media screen and (min-width: 500px) {}

        /* For medium devices */
        @media screen and (min-width: 767px) {}
    </style>
@endsection
