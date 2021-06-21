<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{setting("app_name")}}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- Styles -->
    <style>
        :root {
            --main_color:{{setting('main_color')}};
            --secondary_color:{{setting('secondary_color')}};
        }
    </style>
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/snackbar.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{setting('logo_cover')}}" type="image/x-icon"/>
    
</head>
<body>
  
    <div id="app">
      <div id="snackbar"></div>
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
    <script type="text/javascript">
        // set today date 
        const lang = "{!! currentLocale() !!}";
        const getTodayDate = format => {
          debugger
          var date = new Date();
          options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric', };
          return date.toLocaleDateString(format, options);
        }
        
        document.getElementById('dateToday').textContent = getTodayDate(`${lang}`)
        // fixed the navbar
        const header = document.getElementById("topNavbar");
        window.onscroll = function () {
          if (window.pageYOffset > header.offsetTop) {
            header.classList.add("sticky");
            header.classList.add("container");
            header.classList.add("p-2");
          } else {
            header.classList.remove("sticky");
            header.classList.remove("container");
            header.classList.remove("p-2");
          }
        };
      </script>

    @yield('javascript')
</body>
</html>
