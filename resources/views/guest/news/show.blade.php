
	

    @extends('layouts.guest')
@section('main')
<main class="container p-2">
    <!-- page title -->
    <div class="text-gray-500 py-1 {{textSide()}} text-xl capitalize subpixel-antialiased">
        {{getDateString($news->created_at)}}
    </div>
    <div class="text-black py-1 text-3xl capitalize subpixel-antialiased flex  @if(isRTL()) flex-row-reverse @endif {{textSide()}}">
        <div class="lg:w-4/5  w-11/12 {{textSide()}}">
            @if(isRTL())
            	{{$news->ar_title}}
			@else 
				{{$news->en_title}}
			@endif
        </div>
    </div>
    <!-- page body -->
    <section class="my-3">
        <div class="flex flex-col my-2">
            <div class="w-full h-72 flex @if(isRTL()) flex-row-reverse @else  flex-row @endif  ">
                <img src="{{$news->cover}}" class="w-4/5 h-full shadow-md object-center rounded" alt="news-image">
            </div>
            
            <p class="py-4 text-black font-base text-lg {{textSide()}}">
                @if(isRTL())
                	{{$news->ar_description}}
    			@else 
				    {{$news->en_description}}
			    @endif
            </p>
            
           
            <div class="{{textSide()}} @if(isRTL())flex flex-row-reverse @else flex-row @endif" >
                <a href="{{route('news')}}"
                    class="btn group bg-red my-2 text-white px-3 py-2 font-medium rounded text-md hover:bg-red-500 focus:outline-none ">
                    <span class="group-hover:text-gray-100 ">{{__("news")}}</span>
                </a>
                <button type="button"
                        class="bg-white items-center border-none rounded-md px-3 py-2 opacity-50 hover:opacity-100 focus:outline-none focus:border-green-400"
                        data-toggle="modal" data-target="#news{{$news->id}}">
                        <i class="fas fa-share    "></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="news{{$news->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{__("link")}}  </label>
                                    <input readonly 
                                        class="form-control focus:outline-none focus:ring-0"
                                        id="recipient-name" 
                                        value="{{asset("/news/".$news->id)}}">
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