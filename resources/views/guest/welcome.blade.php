@extends('layouts.guest')
@section('mainStyle')
    <style>
      .slick-prev{      
        position: absolute ;
        z-index: 10;
        top: 45%;
        left: 2%;
        width: 30px;
        height: 30px;
        border-radius: 50%;
      }
      .slick-next{
        position: absolute ;
        z-index: 10;
        top: 45%;
        right: 2%;
        width: 30px;
        height: 30px;
        border-radius: 50%;
      }
    </style>
@endsection

@section('main')


  <main class="container">
    <!-- page body -->
    <section >
      <div class="slider mb-3">
        @foreach ($slides as $slide)  
            <div> 
              <img src="{{asset($slide->cover)}}" alt="" 
              style="height: 400px; width: 100%;">
            </div>
        @endforeach
       
        
      </div>
      <div class="word w-full flex flex-row items-center justify-between p-4 mb-3">
        <div class="flex-1 ">
            <h1 class=" text-2xl font-medium flex flex-row-reverse justify-center text-center ">
              {{setting("home_page_word_head")}}
            </h1>            
            <p class="text-lg flex flex-row-reverse justify-center text-center ">
              {{setting("home_page_word_content")}}
            </p>            
        </div>
        <div class="flex-1 flex flex-row justify-end text-right">
          <img src="{{setting('boss_avatar')}}" class="w-80 h-80" style="border-radius: 50%" >
        </div>
      </div>
      <div class="relative mb-3" style="padding-top: 56.25%">
        <iframe class="absolute inset-0 w-full h-full" src="{{setting('home_page_video_src')}}" frameborder="0" …></iframe>
      </div>
    </section>

  </main>
@endsection

@section('javascript')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript">
    $(".slider").slick({
      // normal options...
      infinite: false,
      dots: false,
      prevArrow:'<button type="button" class="slick-prev"><i class="fa fa-arrow-circle-left text-lg text-white" aria-hidden="true"></i></button>',
      nextArrow:'<button type="button" class="slick-next"><i class="fa fa-arrow-circle-right text-lg text-white" aria-hidden="true"></i></button>',
      // the magic
      responsive: [{

          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            infinite: true
          }

        }, {

          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            dots: true
          }

        }, {

          breakpoint: 300,
          settings: "unslick" // destroys slick

        }]
      });
  </script>
@endsection

