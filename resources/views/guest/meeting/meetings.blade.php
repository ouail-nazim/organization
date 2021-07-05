@extends('layouts.guest')
@section('main')
  <main class="container p-2">
    <!-- page title -->
    <div class="text-black py-1 text-center text-3xl capitalize subpixel-antialiased">
      {{__('meetings')}}
    </div>
    <!-- page body -->
    <section class="my-3  d-flex @if(isRTL())flex flex-row-reverse @endif">
      <div class="w-full">
				<div class="d-felx row w-100 @if(isRTL())flex flex-row-reverse @else flex-row @endif">
					{{-- box --}}
					@foreach ($meetings as $item)
						<div class="col-xl-3 col-lg-4  col-md-6 col-12 p-1">
							<div class="bg-gray-50 rounded-md shadow-md px-3 h-80  py-4 flex flex-col items-center hover:shadow-xl transition duration-500 ease-in-out">
								<img src="{{$item->cover}}" class="w-full h-40 rounded-md" alt="meeting background">
								<p class=" my-3 {{textSide()}} text-lg w-full ">
									@if(isRTL())
										{{$item->ar_title}}
									@else 
										{{$item->en_title}}
									@endif
								</p>
								<div class="w-full {{textSide()}}">
									<a href="{{route('meetings.read',["meeting"=>$item->id])}}"
										class="bg-red px-3 hover:no-underline text-white py-2 rounded-md text-right hover:bg-red-500 focus:outline-none">
										{{__("read more")}}
									</a>
								</div>
							</div>
						</div>
					@endforeach
						
				</div>
				@if($meetings->count() > 0)
					<!-- pagination -->
					<nav class="flex flex-row justify-center">
						<ul class="pagination">
							<li class="page-item   @if($meetings->currentPage() == 1) disabled @endif ">
								<a  class="page-link @if($meetings->currentPage() != 1) text-red hover:bg-gray-200 hover:text-red-400 @endif"
									href="{{ $meetings->previousPageUrl() }}">
									{{__('previous')}}
								</a>
							</li>
							<li class="page-item disabled" aria-current="page">
								<p class="page-link text-red ">
									{{__('page')}} 
									{{ $meetings->currentPage() }} 
									{{__('of')}} 
									{{ $meetings->lastPage() }}
								</p>
							</li>
							<li class="page-item @if($meetings->currentPage() == $meetings->lastPage()) disabled @endif">
								<a  class="page-link @if($meetings->currentPage() != $meetings->lastPage()) text-red hover:bg-gray-200 hover:text-red-400" @endif" 
									href=" {{ $meetings->nextPageUrl() }}"
								>
								{{__('next')}}
								</a>
							</li>
						</ul>
					</nav>
				@endif
			</div>
    </section>
  </main>
@endsection


