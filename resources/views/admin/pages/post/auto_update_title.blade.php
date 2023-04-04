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

        var domain = 'http://localhost:8003/';

        fetch("https://openai-api-paid-yak3s7dv3a-ue.a.run.app/?q=%0A%0A" + str +
                "&userid=d81dc5a0b63c27ff136ed870b25835cb3ceb66b2db49effa1aa55d33a4d52&segmentation=ALPHA_VERSION&firebaseToken=eyJhbGciOiJSUzI1NiIsImtpZCI6Ijg3YzFlN2Y4MDAzNGJiYzgxYjhmMmRiODM3OTIxZjRiZDI4N2YxZGYiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiSOG6rXUgSG_DoG5nIFbEg24iLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDMuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2EvQUVkRlRwN3dPamhZOENtZDMtZTRqcWpVYWh6VEZvVmViaHZDejRLVmo4d0U2dz1zOTYtYyIsImlzcyI6Imh0dHBzOi8vc2VjdXJldG9rZW4uZ29vZ2xlLmNvbS9mb3llci13b3JrIiwiYXVkIjoiZm95ZXItd29yayIsImF1dGhfdGltZSI6MTY4MDU4MjI4NSwidXNlcl9pZCI6Ik9WcnY5dndKQmZXUzRxT3MyWllQd3c5d3M5NTMiLCJzdWIiOiJPVnJ2OXZ3SkJmV1M0cU9zMlpZUHd3OXdzOTUzIiwiaWF0IjoxNjgwNTgyMjg1LCJleHAiOjE2ODA1ODU4ODUsImVtYWlsIjoidmFuaGF1MTQwODAwQGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJmaXJlYmFzZSI6eyJpZGVudGl0aWVzIjp7Imdvb2dsZS5jb20iOlsiMTExMTIyMTc1MTA0NDMxMDAyOTIzIl0sImVtYWlsIjpbInZhbmhhdTE0MDgwMEBnbWFpbC5jb20iXX0sInNpZ25faW5fcHJvdmlkZXIiOiJjdXN0b20ifX0.k89fNQGeJ5lc-YbHU_7L-j67aeaPEOjxlrppXAzzaGzn3V1kGFmeKuDkzr6Z0ZcftFS9yrH7nXUCdBzPtJ2tIL2ChuY3rG-KoSZ8ofnRhPqANX685PTs-8wtV7KMQMhVxf_2hkt8Z-YgnDchKx_ACMMyzSPK6eb2sXsazYPXXCFNWD5YI1Tg4NMo70NsSiR_hSXg4xE_TSpRVYPibZfrEs5zsUzz4pt9UR4n0kcO3Er9FzGj4SSj3NKyfZgdHWsGToVvJIlx3LwRX8kQF94VkO3EF4TXtm20K4hk0jgnsq_89egiHR2yRtwSR6fJQWP0GEP2ZUmSDtqlXYz2RHHw4g&requestFrom=DEFAULT",
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
                    return true;
                }).fail(function(e) {
                    return false;
                });
            })
            .catch(error => console.log('error', error));
    </script>
@endsection
