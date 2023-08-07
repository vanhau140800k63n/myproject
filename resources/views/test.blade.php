<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Google AJAX Search API Sample</title>

    <script src="http://www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>

    <script type="text/javascript">
        google.load("language", "1");

        function initialize() {
            var content = document.getElementById('content');
            content.innerHTML = '<div id="text">Hola, me alegro mucho de verte.<\/div><div id="translation"/>';

            var text = document.getElementById("text").innerHTML;
            google.language.translate(text, 'es', 'en', function(result) {
                var translated = document.getElementById("translation");
                if (result.translation) {
                    translated.innerHTML = result.translation;
                }
            });
        }
        google.setOnLoadCallback(initialize);
    </script>
</head>

<body style="font-family: Arial;border: 0 none;">
    <div id="content">Loading...</div>
</body>

</html>
