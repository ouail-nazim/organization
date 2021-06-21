<header class="container relative p-2">
    <div class="flex flex-row justify-center py-1 border-b-2 border-gray-100">
      <div class="flex flex-1 flex-col items-center justify-center content-center">
        <img class="w-8 h-8" src="/images/map.png" alt="map" />
        <span>{{__("DZ")}}</span>
      </div>
      <div class="hidden absolute right-0 lg:block">
        <span id="dateToday" class="text-gray-300 text-sm"></span>
      </div>
    </div>
    <div class="py-1 flex flex-row justify-between border-b-2 border-gray-100">
      <div>
        <ul class="flex flex-row">
          <li class="w-8 h-8 m-2 text-white flex justify-center items-center bg-gray-900 rounded-full">
            <a class="hover:text-white" href="#"><i class="fab fa-facebook-f"></i></a>
          </li>
          <li class="w-8 h-8 m-2 text-white flex justify-center items-center bg-gray-900 rounded-full">
            <a class="hover:text-white" href="#"><i class="fab fa-instagram"></i></a>
          </li>
          <li class="w-8 h-8 m-2 text-white flex justify-center items-center bg-gray-900 rounded-full">
            <a class="hover:text-white" href="#"><i class="fab fa-twitter"></i></a>

          </li>
          <li class="w-8 h-8 m-2 text-white flex justify-center items-center bg-gray-900 rounded-full">
            <a class="hover:text-white" href="#"><i class="fab fa-whatsapp"></i></a>
          </li>
        </ul>
      </div>
      <a href="#">
        <img src="{{ asset(setting('logo_cover')) }}" alt="logo" class="h-14">
      </a>
    </div>
    <!-- Desktop nav bar-->
    @include('comp.topNavbar')
  </header>