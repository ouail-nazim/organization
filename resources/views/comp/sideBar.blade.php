<div id="sideBar" class="fixed top-0   @if(isRTL())right-full @else left-full @endif bg-gray-200 h-screen" style="z-index: 999 ;width: 300px;">
    
    


    <div class="flex flex-no-wrap w-full h-screen relative">
       
        <div  class="w-full h-screen absolute sm:relative bg-gray-50 shadow  flex-col justify-between ">
            <button onclick="closeSideBar()" class="absolute top-2 text-lg right-2 text-red-500 hover:text-red-700 p-2">
                <i class="fas fa-times-circle" aria-hidden="true"></i>
            </button>
            <ul class="mt-12">
                <a href="{{route('home')}}" class="text-black hover:bg-white nav-link text-xl w-full flex @if(isRTL())justify-end @endif cursor-pointer items-center mb-6">
                    <div class="flex flex-row items-center justify-items-center content-center">
                        <span class="mx-2">{{__('home')}}</span>
                    </div>
                </a>
                <a href="{{route('news')}}" class="text-black hover:bg-white nav-link text-xl w-full flex @if(isRTL())justify-end @endif cursor-pointer items-center mb-6">
                    <div class="flex flex-row items-center justify-items-center content-center">
                        <span class="mx-2">{{__('news')}}</span>
                    </div>
                </a>
                <a href="{{route('goals')}}" class="text-black hover:bg-white nav-link text-xl w-full flex @if(isRTL())justify-end @endif cursor-pointer items-center mb-6">
                    <div class="flex flex-row items-center justify-items-center content-center">                        
                        <span class="mx-2">{{__('goals')}}</span>
                    </div>
                </a>
                <a href="{{route('meetings')}}" class="text-black hover:bg-white nav-link text-xl w-full flex @if(isRTL())justify-end @endif cursor-pointer items-center mb-6">
                    <div class="flex flex-row items-center justify-items-center content-center">
                        <span class="mx-2">{{__('meetings')}}</span>
                    </div>
                </a>
                <a href="{{route('contact_us')}}" class="text-black hover:bg-white nav-link text-xl w-full flex @if(isRTL())justify-end @endif cursor-pointer items-center mb-6">
                    <div class="flex flex-row items-center justify-items-center content-center">
                        <span class="mx-2">{{__('contact_us')}}</span>
                    </div>
                </a>
            </ul>
            
        </div>
    </div>
</div>