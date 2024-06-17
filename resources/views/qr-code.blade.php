<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
	    <title>{{ __('QR Code Generator') }}</title>
</head>
<body>
    <div class="text-center">
        <p>{{ __('URL') }}</p>
        <img src="{{ asset('images/qr-code/' . $url_filename) }}">
    </div>
    <div class="text-center">
        <p>{{ __('Logo URL') }}</p>
        <img src="{{ asset('images/qr-code/' . $url_merged_filename) }}">
    </div>
    <div class="text-center">
        <p>{{ __('Logo URL with background color') }}</p>
        <img src="{{ asset('images/qr-code/' . $url_merged_background_filename) }}">
    </div>
    <div class="text-center">
        <p>{{ __('SMS Service') }}</p>
        <img src="{{ asset('images/qr-code/' . $sms_filename) }}">
    </div>
</body>
</html>