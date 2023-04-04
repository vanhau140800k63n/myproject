@extends('admin.master')
@section('head')
    <title> Update title | Devsne</title>
@endsection
@section('content')
    <script>
        str = `{{ $str }}`;
        var myHeaders = new Headers();
        myHeaders.append("Host", "openai-api-paid-yak3s7dv3a-ue.a.run.app");
        myHeaders.append("sec-ch-ua", "\"Google Chrome\";v=\"111\", \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"111\"");
        myHeaders.append("accept", "text/event-stream");
        myHeaders.append("cache-control", "no-cache");
        myHeaders.append("sec-ch-ua-mobile", "?0");
        myHeaders.append("user-agent",
            "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36"
        );
        myHeaders.append("sec-ch-ua-platform", "\"macOS\"");
        myHeaders.append("origin", "https://devsne.vn");
        myHeaders.append("sec-fetch-site", "cross-site");
        myHeaders.append("sec-fetch-mode", "cors");
        myHeaders.append("sec-fetch-dest", "empty");
        myHeaders.append("referer", "https://devsne.vn/");
        myHeaders.append("accept-language", "en-US,en;q=0.9,vi;q=0.8,ja;q=0.7");

        var raw = "";

        var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };

        // var domain = 'http://localhost:8003/';
        var domain = 'https://devsne.vn/';

        fetch("https://openai-api-paid-yak3s7dv3a-ue.a.run.app/?q=%0A%0A" + str +
                "&userid=d81dc5a0b63c27ff136ed870b25835cb3ceb66b2db49effa1aa55d33a4d52&segmentation=ALPHA_VERSION&firebaseToken=eyJhbGciOiJSUzI1NiIsImtpZCI6Ijg3YzFlN2Y4MDAzNGJiYzgxYjhmMmRiODM3OTIxZjRiZDI4N2YxZGYiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiSOG6rXUgVsSDbiIsInBpY3R1cmUiOiJodHRwczovL2xoMy5nb29nbGV1c2VyY29udGVudC5jb20vYS9BR05teXhaQzRHcjB1Y1NXOTlaUWR4a0RNLUxYOXRvaTJZYUI4RUprbkc4PXM5Ni1jIiwiaXNzIjoiaHR0cHM6Ly9zZWN1cmV0b2tlbi5nb29nbGUuY29tL2ZveWVyLXdvcmsiLCJhdWQiOiJmb3llci13b3JrIiwiYXV0aF90aW1lIjoxNjgwNTk0Mzc1LCJ1c2VyX2lkIjoiWlZndm01eldZMmhvR3U2YUpic1RBTHFtUkprMiIsInN1YiI6IlpWZ3ZtNXpXWTJob0d1NmFKYnNUQUxxbVJKazIiLCJpYXQiOjE2ODA1OTQzNzUsImV4cCI6MTY4MDU5Nzk3NSwiZW1haWwiOiJ2aHRlc3QxNDA4MDAwM0BnbWFpbC5jb20iLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJnb29nbGUuY29tIjpbIjExMTM0MzI4ODA4Nzg3NTA4NDI0MyJdLCJlbWFpbCI6WyJ2aHRlc3QxNDA4MDAwM0BnbWFpbC5jb20iXX0sInNpZ25faW5fcHJvdmlkZXIiOiJjdXN0b20ifX0.XHkODBZk6LsASuXhgfc2D2CFtoR3kivA6kqJV8qrSEIdoMenhgSHyVKLwe0EmWpp-PJQUkJwI2GpbviWXnClk_8b_0V6wY13kLEFThDAFfTy45rlPYVBLIptEiA2LB1PJSG8Ci7OTiqLhTS20hAaZva0y1vpo12Ty-uitL1OEQVsqpTo0scIva9Vdrn6DiUmIVrGeZZuccAVvdwOzvTM1STKktlvNBivij1PExr-DhcdCixKNgN8iQTaPm_3vPm_wUQToY8QwdEbvPzD2nMv9m-6fm1Iz-f2tNGvK9Psl8fE3UPJeMqqfXQvRqKLJYWHTuGPkyg5txDvUHAb147sxw&requestFrom=DEFAULT",
                requestOptions)
            .then(response => response.text())
            .then(result => {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: domain + "admin/post/update_title_post",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    type: "POST",
                    dataType: 'json',
                    data: {
                        result: result,
                        id_list: '{{ $id_list }}',
                        _token: _token
                    }
                }).done(function(data) {
                    location.reload();
                }).fail(function(e) {
                    location.reload();
                });
            })
            .catch(error => console.log('error', error));
    </script>
@endsection
