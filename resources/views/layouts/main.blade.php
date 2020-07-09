<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>
{{--    <script--}}
{{--        src="https://code.jquery.com/jquery-3.5.1.js"--}}
{{--        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="--}}
{{--        crossorigin="anonymous"></script>--}}
{{--    <script--}}
{{--        src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"--}}
{{--        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="--}}
{{--        crossorigin="anonymous"></script>--}}

    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <script src="{{mix('/js/app.js')}}"></script>
</head>
<body>
@yield('content')
</body>
</html>
