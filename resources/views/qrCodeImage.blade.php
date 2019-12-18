<!DOCTYPE html>
<html>
    <head>
	    <title>QR 碼產生器</title>
</head>
<body>
    <div class="text-center">
        <p>網址</p>
        <img src="{{ asset('images/qr-code/' . $url_filename) }}">
    </div>
    <div class="text-center">
        <p>網址 - 標誌</p>
        <img src="{{ asset('images/qr-code/' . $url_merged_filename) }}">
    </div>
    <div class="text-center">
        <p>網址 - 標誌 - 背景換色</p>
        <img src="{{ asset('images/qr-code/' . $url_merged_background_filename) }}">
    </div>
    <div class="text-center">
        <p>簡訊服務</p>
        <img src="{{ asset('images/qr-code/' . $sms_filename) }}">
    </div>
</body>
</html>