@extends('layouts.guest')
@section('main')
  <main class="container p-2">
    <!-- page title -->
    <div class="text-black py-1 text-center text-3xl capitalize subpixel-antialiased">
      {{__('goals')}}
    </div>
    <!-- page body -->
    <section class="my-3 ">
      <div class="flex justify-center p-2">
				<img class="h-48" src="{{ asset('/images/goal.svg')}}" alt="goal">
			</div>
			<ol class="list-decimal py-3 flex flex-col">
				<li class="flex @if(isRTL())flex-row-reverse text-right @else flex-row @endif  py-2 text-xl">
					<div class="flex @if(isRTL())flex-row ml-2 @else flex-row-reverse mr-2 @endif ">
            <span>@if(isRTL()) ( @else ) @endif</span>
            <span>1</span>
          </div>
					<div>
						العناية بتاريخ المملكة العربية السعودية والجزيرة العربية بصورة خاصة, والتاريخ الإسلامي بصورة
						عامة, دراسة وتوثيقاً وتحقيقاً ، من خلال المؤتمرات العلمية، وإصدار المطبوعات المختلفة
					</div>
				</li>
				
			</ol>
    </section>
  </main>
@endsection

@section('javascript')

@endsection
