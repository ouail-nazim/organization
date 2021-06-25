

@extends('admin.master')

@section('main-content')

    @section('content')
        <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Edit Meeting num : {{$meeting->id}}</h3>
            </div>
            <form class="card-body" enctype="multipart/form-data"
                  action="{{route('admin.meeting.edit',['meeting'=>$meeting->id])}}" method="post">
                @csrf
                @method('put')

                {{-- cover --}}
                <label for="change_cover">
                    <img src="{{$meeting->cover}}" alt="meeting-cover" class="img-circle img-fluid my-2" style="width:150px;height: 150px;" >
                    <input onchange="changeCover(this)" type="file" name="cover" id="change_cover" class="d-none">
                    <input id="cover_changed" type="hidden" name="cover_changed" value="false"">
                    @error('cover')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </label>

                <script type="text/javascript">
                    const changeCover=input=>{                
                      const url=URL.createObjectURL(input.files[0]);
                      input.parentElement.querySelector("img").src=url;
                      input.parentElement.querySelector("#cover_changed").value="true"
                    }
                </script>
                 {{-- Arabic title --}}
                 <div class="form-group">
                    <label>Arabic title </label>
                    <input  value="{{old("ar_title")? old("ar_title") :$meeting->ar_title }}" name="ar_title" type="text" class="form-control text-right" required  />
                    @error('ar_title')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Arabic Description --}}
                <div class="form-group">
                    <label>Arabic Description </label>
                    <textarea name="ar_description" class="form-control text-right" rows="3" placeholder="...">{{old("ar_description")? old("ar_description") :$meeting->ar_description }}</textarea>
                    @error('ar_description')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                 {{-- English title --}}
                 <div class="form-group">
                    <label>English title </label>
                    <input  value="{{old("en_title")? old("en_title") :$meeting->en_title }}" name="en_title" type="text" class="form-control text-left" required  />
                    @error('en_title')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                 {{-- English Description --}}
                 <div class="form-group">
                    <label>English Description </label>
                    <textarea name="en_description" class="form-control" rows="3" placeholder="...">{{old("en_description")? old("en_description") :$meeting->en_description }}</textarea>
                    @error('en_description')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

               
                
               
                


                <div class="form-group d-flex flex-row-reverse">
                    <input type="submit" class="btn btn-success w-25" value="Save">
                </div>
            </form>
           
        </div>
    @endsection
   
@endsection