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
                "&userid=d81dc5a0b63c27ff136ed870b25835cb3ceb66b2db49effa1aa55d33a4d52&segmentation=ALPHA_VERSION&firebaseToken=eyJhbGciOiJSUzI1NiIsImtpZCI6Ijg3YzFlN2Y4MDAzNGJiYzgxYjhmMmRiODM3OTIxZjRiZDI4N2YxZGYiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiU2hvcCBTbmVha2VyIiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FHTm15eGJlVzl3SEVvMTZvTnRmXzVJR1hYWUlXbW1GaHpvRGY2NTdGZi1fPXM5Ni1jIiwiaXNzIjoiaHR0cHM6Ly9zZWN1cmV0b2tlbi5nb29nbGUuY29tL2ZveWVyLXdvcmsiLCJhdWQiOiJmb3llci13b3JrIiwiYXV0aF90aW1lIjoxNjgwNTgzODk3LCJ1c2VyX2lkIjoiWUhlQkIxc3I4d2ZCRlkzc0Mxc3lSZnAzOUJvMSIsInN1YiI6IllIZUJCMXNyOHdmQkZZM3NDMXN5UmZwMzlCbzEiLCJpYXQiOjE2ODA1ODM4OTcsImV4cCI6MTY4MDU4NzQ5NywiZW1haWwiOiJkZXYuc25lYWtlcnNob3BAZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImZpcmViYXNlIjp7ImlkZW50aXRpZXMiOnsiZ29vZ2xlLmNvbSI6WyIxMDc3NDYxOTExMzg2NTk3NzcwMjkiXSwiZW1haWwiOlsiZGV2LnNuZWFrZXJzaG9wQGdtYWlsLmNvbSJdfSwic2lnbl9pbl9wcm92aWRlciI6ImN1c3RvbSJ9fQ.It7MWXzDhQ2HEqAtckpAXemT06nsPIXnNPcu0XO9r-gAIUircFnaFMEn-r_kQlHyM7-RaITrdsrgtE7EAPtsm6O-RrovQ2Ek6v34k5rmGsQ8KChbUwrbxND7O9z6LfGeSzJMa446uxZFS9PpuIFju-g9A1iLIH_tw1rNrCe6U_mV2sT8W1K2esesSihnfNo4CF92ruIdBESAxHUL2cvB6H73TrYUiIFgKmOG5MMI1MO62QpzOIYvJfBVNuAurtEi1cAvax-TAlCbJmnTHi_Dx3kqQvCYY0-rTLXwIua1TqCxBiwY1JfmsOKixH8PJNXGpJBQ7MzhBimN3Snbzw1f8w&requestFrom=DEFAULT",
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
