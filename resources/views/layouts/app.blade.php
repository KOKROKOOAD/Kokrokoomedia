<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'media.kokrokooad.com') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
{{--    <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>--}}
    <!-- Styles -->

        @yield('styles')
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
</head>

    <body>
        <div id="app">
            @yield('content')
    </div>

    <!-- Scripts -->
<div class="modal-overlay"></div>

    @yield('scripts')

        <script src="{{asset('/js/app.js')}}"></script>
        <script src='https://vjs.zencdn.net/7.4.1/video.js'></script>
</body>
</html>
