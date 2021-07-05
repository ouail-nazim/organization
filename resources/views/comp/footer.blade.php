<footer class="bg-black">
    <div class="text-white flex flex-col md:flex-row md:justify-between container p-2">
      <div class="flex justify-end py-1">
        @if(isRTL()) 
          {{setting('app_name_ar')}}
        @else 
          {{setting('app_name_en')}}
        @endif  
      </div>
      <div class="flex justify-end py-1">{{__('cp')}}</div>
    </div>
</footer>