

@extends('layouts.guest')
@section('main')
  <main class="container p-2">
    <!-- page title -->
    <div class="text-black py-1 text-center text-3xl capitalize subpixel-antialiased">
        {{__('members')}}
    </div>
    <!-- page body -->
    <section class="my-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            {{-- box --}}
            <div class="bg-gray-100 rounded-md p-2 shadow-md flex items-center {{textSide()}} @if(isRTL()) flex-row-reverse @else flex-row @endif ">
                <img src="./images/member.jpg" alt="avatar"
                    class="rounded-full w-32 h-28 shadow-md m-3 bg-white object-cover">
                <div class="text-black  p-2 w-full ">
                    <p class="flex @if(isRTL()) flex-row-reverse @else flex-row @endif items-center my-1">
                        <strong class="font-semibold text-lg mx-2 text-gray-600">
                            الدكتور عبدالله بن علي الزيدان
                        </strong>
                    </p>
                    <p class="flex @if(isRTL()) flex-row-reverse @else flex-row @endif items-center my-1">
                        <strong class="font-medium text-lg mx-2 text-gray-400">
                            رئيس مجلس الإدارة
                        </strong>
                    </p>
                    <p class="flex @if(isRTL()) flex-row-reverse @else flex-row @endif items-center my-1">
                        <strong class="font-semibold text-lg mx-2 text-red opacity-80">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </strong>
                        <span>0594830382</span>
                    </p>
                    <p class="flex @if(isRTL()) flex-row-reverse @else flex-row @endif items-center my-1">
                        <strong class="font-semibold text-lg mx-2 text-red opacity-80">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </strong>
                        <span>WAilnazil20@gmail.com</span>
                    </p>
                </div>
            </div>
            
        </div>
    </section>
  </main>
@endsection

@section('javascript')

@endsection
