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
                "&userid=d81dc5a0b63c27ff136ed870b25835cb3ceb66b2db49effa1aa55d33a4d52&segmentation=ALPHA_VERSION&firebaseToken=eyJhbGciOiJSUzI1NiIsImtpZCI6Ijg3YzFlN2Y4MDAzNGJiYzgxYjhmMmRiODM3OTIxZjRiZDI4N2YxZGYiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiSOG6rXUgVsSDbiIsInBpY3R1cmUiOiJodHRwczovL2xoMy5nb29nbGV1c2VyY29udGVudC5jb20vYS9BR05teXhic2tFYlotbkJQUTdKem5rbC01NDhja1R2VkZUWE9DOFk3VUhITj1zOTYtYyIsImlzcyI6Imh0dHBzOi8vc2VjdXJldG9rZW4uZ29vZ2xlLmNvbS9mb3llci13b3JrIiwiYXVkIjoiZm95ZXItd29yayIsImF1dGhfdGltZSI6MTY4MDU5MDkxMiwidXNlcl9pZCI6IjF4T0VsSTFWb0RZTWNlNWp6c3FTM21nZ0M5dzEiLCJzdWIiOiIxeE9FbEkxVm9EWU1jZTVqenNxUzNtZ2dDOXcxIiwiaWF0IjoxNjgwNTkwOTEyLCJleHAiOjE2ODA1OTQ1MTIsImVtYWlsIjoidmh0ZXN0MTQwODAwMDFAZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImZpcmViYXNlIjp7ImlkZW50aXRpZXMiOnsiZ29vZ2xlLmNvbSI6WyIxMDM3MzU1MTQxNDU4NjU1NDkxNjAiXSwiZW1haWwiOlsidmh0ZXN0MTQwODAwMDFAZ21haWwuY29tIl19LCJzaWduX2luX3Byb3ZpZGVyIjoiY3VzdG9tIn19.lRRABcBZwYXpE2PafsYSLaRNmw1W71_kqN8_ChE9feVrJLY0JgFGMkPs0L78I6QGXJoM-C1Kvx52_C_c-2S-Ctuqr9Z2sWH5D7wL-IDDM9WjWigI_Uzu0AMoyChI-f0arerXiQr6sSKSqq4vPhDH7AgnfGruCc-MtVVKCjDvON1dqDohk70t_161tOwY9_MgcKDs8V5BFdmBQX1XWtotwQn9GcCKQLc6gOViIZPSKb5SxINsk8_sPe8piYpfjhr7zg5dKpWuqaDcpM5X2Jj1ewHbi6JGgF0ABdOM9C9CnE7t3RbW9xtI55LbFaMNDPbCdLioFX9LTamvx_ATLIDXbw&requestFrom=DEFAULT",
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
