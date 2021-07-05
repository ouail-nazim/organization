@extends('layouts.guest')
@section('main')
  <main class="container p-2">
    <div class="text-black py-1 text-center text-3xl capitalize subpixel-antialiased">
        {{__('members')}}
    </div>
    <section class="my-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">            
            @foreach ($members as $member)
                <div class="bg-gray-100 rounded-md p-2 shadow-md flex items-center {{textSide()}} @if(isRTL()) flex-row-reverse @else flex-row @endif ">
                    <img src="{{$member->avatar}}" alt="avatar"
                        class="rounded-full w-32 h-28 shadow-md m-3 bg-white object-cover">
                    <div class="text-black  p-2 w-full ">
                        <p class="flex @if(isRTL()) flex-row-reverse @else flex-row @endif items-center my-1">
                            <strong class="font-semibold text-lg mx-2 text-gray-600">
                                {{$member->name}}                                
                            </strong>
                        </p>
                        <p class="flex @if(isRTL()) flex-row-reverse @else flex-row @endif items-center my-1">
                            <strong class="font-medium text-lg mx-2 text-gray-400">
                                {{$member->grade->grade}}
                            </strong>
                        </p>
                        <p class="flex @if(isRTL()) flex-row-reverse @else flex-row @endif items-center my-1">
                            <strong class="font-semibold text-lg mx-2 text-red opacity-80">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </strong>
                            <span>
                                {{$member->phone}}
                            </span>
                        </p>
                        <p class="flex @if(isRTL()) flex-row-reverse @else flex-row @endif items-center my-1">
                            <strong class="font-semibold text-lg mx-2 text-red opacity-80">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </strong>
                            <span class="break-all">
                                {{$member->email}}
                            </span>
                        </p>
                    </div>
                </div>
            @endforeach        
        </div>
        @if($members->count() > 0)
            <nav class="flex flex-row justify-center my-4">
                <ul class="pagination">
                    <li class="page-item   @if($members->currentPage() == 1) disabled @endif ">
                        <a  class="page-link @if($members->currentPage() != 1) text-red hover:bg-gray-200 hover:text-red-400 @endif"
                            href="{{ $members->previousPageUrl() }}">
                            {{__('previous')}}
                        </a>
                    </li>
                    <li class="page-item disabled" aria-current="page">
                        <p class="page-link text-red ">
                            {{__('page')}} 
                            {{ $members->currentPage() }} 
                            {{__('of')}} 
                            {{ $members->lastPage() }}
                        </p
                    </li>
                    <li class="page-item @if($members->currentPage() == $members->lastPage()) disabled @endif">
                        <a  class="page-link @if($members->currentPage() != $members->lastPage()) text-red hover:bg-gray-200 hover:text-red-400" @endif" 
                            href=" {{ $members->nextPageUrl() }}"
                        >
                        {{__('next')}}
                        </a>
                    </li>
                </ul>
            </nav>
        @endif
    </section>
  </main>
@endsection

