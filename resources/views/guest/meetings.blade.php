@extends('layouts.guest')
@section('main')
  <main class="container p-2">
    <!-- page title -->
    <div class="text-black py-1 text-center text-3xl capitalize subpixel-antialiased">
      {{__('meetings')}}
    </div>
    <!-- page body -->
    <section class="my-3  d-flex @if(isRTL())flex flex-row-reverse @endif">
      <div class="conainer">
				<div class="d-felx row w-100 @if(isRTL())flex flex-row-reverse @else flex-row @endif">
					{{-- box --}}
          <div class="col-xl-3 col-lg-4  col-md-6 col-12 p-1">
						<div class="bg-gray-50 rounded-md shadow-md px-3  py-4 flex flex-col items-center hover:shadow-xl transition duration-500 ease-in-out">
							<img src="/images/meeting.jpg" class="w-full h-40 rounded-md" alt="meeting background">
							<p class=" my-3 {{textSide()}} text-lg w-full ">
								صاعقةُ الإسلام سُلطانُ إقليم الرُّوم الغازي جلالُ
							</p>
							<div class="w-full {{textSide()}}">
								<a href="#"
									class="bg-red px-3 text-white py-2 rounded-md text-right hover:bg-red-500 focus:outline-none">
									{{__("read more")}}
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- pagination -->
				<nav class=" mt-3 flex flex-row justify-center">
					<ul class="pagination">
						<li class="page-item disabled">
							<a class="page-link text-red hover:bg-gray-200 hover:text-red-400" href="#">Previous</a>
						</li>
						<li class="page-item disabled" aria-current="page">
							<a class="page-link text-red ">page 1 of 50</a>
						</li>
						<li class="page-item">
							<a class="page-link text-red hover:bg-gray-200 hover:text-red-400" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>
    </section>
  </main>
@endsection

@section('javascript')

@endsection
