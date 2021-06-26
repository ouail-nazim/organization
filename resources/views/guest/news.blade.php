@extends('layouts.guest')
@section('main')
  <main class="container p-2">
    <!-- page title -->
    <div class="text-black py-1 text-center text-3xl capitalize subpixel-antialiased">
      {{__('news')}}
    </div>
    <!-- page body -->
    <section class="my-3 ">
      	

		@foreach ($news as $item)
			<div class="flex flex-col my-3">
				<div class="w-full h-96 shadow-md ">
					<img src="{{$item->cover}}" class="w-full h-full object-center rounded" alt="news-image">
				</div>
				<p class="mt-2 text-gray-500 font-medium text-base {{textSide()}}">
					{{getDateString($item->created_at)}}
				</p>
				<p class="py-2 text-black font-semibold text-xl {{textSide()}}">
					@if(isRTL())
						{{$item->ar_title}}
					@else 
						{{$item->en_title}}
					@endif
				</p>
				<div class="{{textSide()}} @if(isRTL())flex flex-row-reverse @else flex-row @endif" >
					<a href="#"
						class="btn group bg-red my-2 text-white px-3 py-2 font-medium rounded text-md hover:bg-red-500 focus:outline-none ">
						<span class="group-hover:text-gray-100 ">{{__("read more")}}</span>
					</a>
					<button type="button"
							class="bg-white items-center border-none rounded-md px-3 py-2 opacity-50 hover:opacity-100 focus:outline-none focus:border-green-400"
							data-toggle="modal" data-target="#news{{$item->id}}">
							<i class="fas fa-share    "></i>
					</button>
					<!-- Modal -->
					<div class="modal fade" id="news{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-body">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">{{__("link")}}  </label>
										<input readonly 
											class="form-control focus:outline-none focus:ring-0"
											id="recipient-name" 
											value="{{asset("/news/".$item->id)}}">
									</div>
								</div>
								<div class="modal-footer border-none">
									<a class="text-gray-500 mx-2 cursor-pointer hover:text-gray-700"
										data-dismiss="modal">{{__("close")}}</a>
									<button onclick="copyLink(this)" type="button"
										class="btn bg-red text-white">{{__("copy")}}</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		@endforeach

			<!-- pagination -->
			<nav class="flex flex-row justify-center">
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
    </section>
  </main>
@endsection

@section('javascript')
  <script type="text/javascript">
    const copyLink = btn => {
      $(btn.parentElement.parentElement.querySelector('input')).select();
      document.execCommand('copy');
      btn.parentElement.querySelector('a').click();
      var x = document.getElementById("snackbar");
      x.className = "show";
      x.textContent = "Link copied"
      setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
    }
  </script>
@endsection
