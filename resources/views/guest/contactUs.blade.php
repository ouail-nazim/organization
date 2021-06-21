@extends('layouts.guest')
@section('main')
  <main class="container p-2">
    <!-- page title -->
    <div class="text-black py-1 text-center text-3xl capitalize subpixel-antialiased">
      {{__('contact_us')}}
    </div>
    <!-- page body -->
    <section class="flex flex-col py-4 @if(isRTL())md:flex-row-reverse @else flex-row @endif justify-between ">
        <div class="md:w-2/5 m-2 flex flex-col">
            <div class="{{textSide()}} flex flex-col mb-2">
                <div class="text-red text-xl flex @if(isRTL())flex-row-reverse @else flex-row @endif">
                    <i class="fas fa-mobile-alt mx-2"></i>
                    <span> {{__("mobile number")}}</span>
                </div>
                <div class="m-2 font-semibold text-lg">
                    0540037061
                </div>
            </div>
            <div class="{{textSide()}} flex flex-col mb-2">
                <div class="text-red text-xl flex @if(isRTL())flex-row-reverse @else flex-row @endif">
                    <i class="fas fa-phone mx-2"></i>
                    <span> {{__("phone number")}}</span>
                </div>
                <div class="m-2 font-semibold text-lg">
                    031627292
                </div>
            </div>
            <div class="{{textSide()}} flex flex-col mb-2">
                <div class="text-red text-xl flex @if(isRTL())flex-row-reverse @else flex-row @endif">
                    <i class="fas fa-map-marker-alt mx-2"></i>
                    <span>{{__("address")}}</span>
                </div>
                <div class="m-2 font-semibold text-lg">
                    speech. 123 Main Street, New York, NY 10030
                </div>
            </div>
            <div class="{{textSide()}} flex flex-col mb-2">
                <div class="text-red text-xl flex @if(isRTL())flex-row-reverse @else flex-row @endif">
                    <i class="fas fa-envelope mx-2"></i>
                    <span>{{__("email")}}</span>
                </div>
                <div class="m-2 font-semibold text-lg">
                    <p>wail@gmail.com</p>
                    <p>test@yahoo.com</p>

                </div>
            </div>
        </div>
        <div class="md:w-3/5 m-2">
            <img src="{{asset('/images/map2.png')}}" class="w-full h-96">
        </div>
    </section>
  </main>
@endsection

@section('javascript')

@endsection
