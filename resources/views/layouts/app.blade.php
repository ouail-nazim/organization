<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
          @if(isRTL()) 
            {{setting('app_name_ar')}}
          @else 
            {{setting('app_name_en')}}
          @endif  
    </title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- Styles -->
    <style>
        :root {
            --main_color:{{setting('main_color')}};
            --secondary_color:{{setting('secondary_color')}};
        }
    </style>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/snackbar.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{setting('logo_cover')}}" type="image/x-icon"/>
    @yield('style')
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

        window.document.addEventListener('click',e=>{
          if(e.target.getAttribute("id")!=="showSideBar"){
            if(e.target.parentElement.parentElement.getAttribute("id")!=="sideBar"){
              closeSideBar()
            }
          }
        })
        // set today date 
        const lang = "{!! currentLocale() !!}";
        const getTodayDate = format => {
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

        function showSideBar() {
          const sideBar=document.querySelector("#sideBar")
         
          if(sideBar.classList.contains("right-full")){
            sideBar.classList.replace("right-full","right-0")
          }
          if(sideBar.classList.contains("left-full")){
            sideBar.classList.replace("left-full","left-0")
          }
        }
        function closeSideBar() {
          const sideBar=document.querySelector("#sideBar")
          if(sideBar.classList.contains("right-0")){
            sideBar.classList.replace("right-0","right-full")
          }
          if(sideBar.classList.contains("left-0")){
            sideBar.classList.replace("left-0","left-full")
          }
        }

      </script>

    @yield('javascript')
</body>
</html>
