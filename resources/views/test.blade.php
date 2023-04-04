@extends('layouts.master')
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

        var text = ''

        fetch("https://openai-api-paid-yak3s7dv3a-ue.a.run.app/?q=%0A%0A" + str +
                "&userid=d81dc5a0b63c27ff136ed870b25835cb3ceb66b2db49effa1aa55d33a4d52&segmentation=ALPHA_VERSION&firebaseToken=eyJhbGciOiJSUzI1NiIsImtpZCI6Ijg3YzFlN2Y4MDAzNGJiYzgxYjhmMmRiODM3OTIxZjRiZDI4N2YxZGYiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiSOG6rXUgSG_DoG5nIFbEg24iLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDMuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2EvQUVkRlRwN3dPamhZOENtZDMtZTRqcWpVYWh6VEZvVmViaHZDejRLVmo4d0U2dz1zOTYtYyIsImlzcyI6Imh0dHBzOi8vc2VjdXJldG9rZW4uZ29vZ2xlLmNvbS9mb3llci13b3JrIiwiYXVkIjoiZm95ZXItd29yayIsImF1dGhfdGltZSI6MTY4MDUwOTQ5NywidXNlcl9pZCI6Ik9WcnY5dndKQmZXUzRxT3MyWllQd3c5d3M5NTMiLCJzdWIiOiJPVnJ2OXZ3SkJmV1M0cU9zMlpZUHd3OXdzOTUzIiwiaWF0IjoxNjgwNTA5NDk3LCJleHAiOjE2ODA1MTMwOTcsImVtYWlsIjoidmFuaGF1MTQwODAwQGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJmaXJlYmFzZSI6eyJpZGVudGl0aWVzIjp7Imdvb2dsZS5jb20iOlsiMTExMTIyMTc1MTA0NDMxMDAyOTIzIl0sImVtYWlsIjpbInZhbmhhdTE0MDgwMEBnbWFpbC5jb20iXX0sInNpZ25faW5fcHJvdmlkZXIiOiJjdXN0b20ifX0.Iae5DcW1DeKGzQGqroLlgZ6GU1wybPvK_np18SMVsN8vZQb1L8VsBhfZSLjMUb97I8kEzI01P0kJRw7VqfjDRJe5EeR3QMnuovZYVOqMcPuLz9Djw80UgT0hfr2epYpJT-a7_dv1_8mBicFE7cIjyupvpVEbMVaEoklKGKk-q0SC_P6gRiECXOxqLe-Vcx62GetDIZ_sWqafxv6OSkwioSvckzSZLJJcOPAgY2c3xGQrcsXidI_yhaCSySSOi9AWb5cbqL3uwwZhc2GiGsOsbwyGsNv1XHHJQmFcIKrDSbjKV865gagkzIMxW2wqx1vzmfKCufcsrvFNhAr0SiU6vQ&requestFrom=DEFAULT",
                requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
    </script>
@endsection
