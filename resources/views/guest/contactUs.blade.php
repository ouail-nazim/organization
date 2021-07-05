@extends('layouts.guest')
@section('main')
  <main class="container p-2">
    <!-- page title -->
    <div class="text-black py-1 text-center text-3xl capitalize subpixel-antialiased">
      {{__('contact_us')}}
    </div>
    <!-- page body -->
    <section class="flex flex-col py-4 @if(isRTL()) md:flex-row md:flex-row-reverse @else md:flex-row @endif justify-between ">
        <div class="md:w-2/5 m-2 flex flex-col">
            <div class="{{textSide()}} flex flex-col mb-2">
                <div class="text-red text-xl flex @if(isRTL())flex-row-reverse @else flex-row @endif">
                    <i class="fas fa-mobile-alt mx-2"></i>
                    <span> {{__("mobile number")}}</span>
                </div>
                <div class="m-2 font-semibold text-lg">
                    {{setting("mobile")}}
                </div>
            </div>
            <div class="{{textSide()}} flex flex-col mb-2">
                <div class="text-red text-xl flex @if(isRTL())flex-row-reverse @else flex-row @endif">
                    <i class="fas fa-phone mx-2"></i>
                    <span> {{__("phone number")}}</span>
                </div>
                <div class="m-2 font-semibold text-lg">
                    {{setting("phone")}}
                </div>
            </div>
            <div class="{{textSide()}} flex flex-col mb-2">
                <div class="text-red text-xl flex @if(isRTL())flex-row-reverse @else flex-row @endif">
                    <i class="fas fa-map-marker-alt mx-2"></i>
                    <span>{{__("address")}}</span>
                </div>
                <div class="m-2 font-semibold text-lg">
                    {{setting("address")}}
                </div>
            </div>
            <div class="{{textSide()}} flex flex-col mb-2">
                <div class="text-red text-xl flex @if(isRTL())flex-row-reverse @else flex-row @endif">
                    <i class="fas fa-envelope mx-2"></i>
                    <span>{{__("email")}}</span>
                </div>
                <div class="m-2 font-semibold text-lg">
                    {{setting("email")}}
                </div>
            </div>
        </div>
        <div class="md:w-3/5 m-2">
            <form method="post" action="{{route("sendMail")}}" class="w-full h-96 flex flex-col justify-start items-center relative  ">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    {{-- first/last name --}}
                    <div class="w-full flex flex-col xl:flex-row  justify-start">
                        <div class="flex flex-col flex-1 xl:mr-2">
                            <input  style="border: solid 1px #ccc" 
                                    id="firstName"
                                    class="rounded-md  p-2 mt-3 {{textSide()}}"
                                    placeholder="{{__("first name")}}"
                                    type="text"
                                    name="firstName"
                                    value="{{old("firstName")}}"
                                    required
                            />
                            @error('firstName')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col flex-1 xl:ml-2">
                            <input  style="border: solid 1px #ccc" 
                                    id="LastName"
                                    class="rounded-md  p-2  mt-3 {{textSide()}}"
                                    placeholder="{{__("last name")}}"
                                    type="text"
                                    name="lastName"
                                    value="{{old("LastName")}}"
                                    required
                            />
                            @error('lastName')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>             
                    </div>
                    {{-- email --}}
                    <input  style="border: solid 1px #ccc" 
                            id="email"
                            class="rounded-md w-full p-2 mt-3 {{textSide()}}"
                            placeholder="{{__("email")}}"
                            type="email"
                            name="email"
                            value="{{old("email")}}"
                            required
                    />
                    @error('email')            
                        <p class="text-red-500 text-sm w-4/5">{{ $message }}</p>
                    @enderror
                    {{-- phone --}}
                    <p class="text-red-500 text-xm w-full mt-3 {{textSide()}}">{{__('not required')}}</p>
                    <input  style="border: solid 1px #ccc" 
                            id="phone"
                            class="rounded-md w-full p-2 {{textSide()}} "
                            placeholder="{{__("phone number")}}"
                            type="text"
                            name="phone"
                            value="{{old("phone")}}"
                            
                    />
                    @error('phone')            
                        <p class="text-red-500 text-sm w-4/5">{{ $message }}</p>
                    @enderror
                    {{-- subject --}}
                    <input  style="border: solid 1px #ccc" 
                            id="subject"
                            class="rounded-md w-full p-2 mt-3 {{textSide()}}"
                            placeholder="{{__("subject")}}"
                            type="text"
                            name="subject"
                            value="{{old("subject")}}"
                            required
                    />
                    @error('subject')            
                        <p class="text-red-500 text-sm w-4/5">{{ $message }}</p>
                    @enderror
                    {{-- message --}}
                    <textarea name="message" id="message" cols="30" rows="10"
                        style="border: solid 1px #ccc;min-height: 70px;"
                        class="rounded-md w-full p-2 mt-3 min-h-20 {{textSide()}}"
                        placeholder="{{__("message")}}"
                        required
                    >{{old('message')}}</textarea>
                    @error('message')            
                        <p class="text-red-500 text-sm w-4/5">{{ $message }}</p>
                    @enderror
                    <p class="text-red-500 text-right text-sm w-full">
                        <button type="submit" class="bg-red w-1/4 text-white font-medium rounded-md p-1.5  my-2">
                             {{__("send")}} <i class="far fa-envelope"></i>
                        </button>
                    </p>
            </form>
        </div>
    </section>
  </main>
@endsection

@section('javascript')

@endsection
