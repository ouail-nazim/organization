<nav id="topNavbar" class="hidden md:flex py-1 @if(isRTL()) flex-row @else flex-row-reverse @endif  items-center justify-between border-b-2 border-gray-100">
      <div class="dropdown @if(!isRTL()) dropleft  @endif ">
        <a class="text-md items-center justify-center flex text-gray-400 nav-link dropdown-toggle" href="#"
          role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <i class="fa fa-language text-2xl"></i>
        </a>

        <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item flex flex-row focus:bg-transparent" href="?lang=en">
            <img src="./images/en.png" alt="en" class="mx-3 w-6 h-6">
            <span class="text-black">English</span>
          </a>
          <a class="dropdown-item flex flex-row focus:bg-transparent" href="?lang=ar">
            <img src="./images/ar.png" alt="en" class="mx-3 w-6 h-6">
            <span class="text-black">Arabic</span>
          </a>
        </div>
      </div>
      <div>
        <ul class="py-2 flex @if(isRTL()) flex-row-reverse @endif  ">
          <li class="mx-2">
            <a href="{{route('home')}}" class="text-black nav-link cursor-pointer">{{__('home')}}</a>
          </li>
          <li class="mx-2">
            <a href="{{route('news')}}" class="text-black nav-link cursor-pointer">{{__('news')}}</a>
          </li>
          <li class="mx-2">
            <a href="{{route('goals')}}" class="text-black nav-link cursor-pointer">{{__('goals')}}</a>
          </li>
          <li class="mx-2">
            <a href="{{route('meetings')}}" class="text-black nav-link cursor-pointer"> {{__('meetings')}}</a>
          </li>
          <li class="mx-2">
            <a href="{{route('members')}}" class="text-black nav-link cursor-pointer">{{__('members')}}</a>
          </li>
          <li class="mx-2">
            <a href="{{route('contact_us')}}"  class="text-black nav-link cursor-pointer">{{__('contact_us')}}</a>
          </li>
        </ul>

      </div>
</nav>