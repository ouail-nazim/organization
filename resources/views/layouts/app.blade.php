<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{setting("app_name")}}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->

    <style>
        :root {
            --main_color:{{setting('main_color')}};
            --secondary_color:{{setting('secondary_color')}};
        }
    </style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/avatar.svg') }}" type="image/x-icon"/>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
