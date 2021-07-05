@extends('admin.master')

@section('main-content')

    @section('content_header')
        <h1>Slides</h1>
    @endsection
    
    @section('content')
        
        <section class="content">
            <div class="row p-1">
                <button class="btn btn-success" data-toggle="modal" data-target="#addSlide">Add slide</button>
                <!-- Modal -->
                  <div class="modal fade" id="addSlide" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{route("admin.slide")}}" method="post" enctype="multipart/form-data">                                
                            @csrf
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <input  type="file"  name="slide" class="form-control w-100"  accept=".jpg , .jpeg , .png , .svg">                              
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            </div>
                        </form>
                    </div>
                  </div>
            </div>
            <div class="row">
                {{-- Meetings --}}
                @foreach ($slides as $slide)
                    <div class="col-lg-4 col-md-6  col-12 p-1">
                        <img src="{{asset($slide->cover)}}"  class="w-100 " height="250px" alt="">                        
                        <form action="{{route('admin.deleteslides',['id'=>$slide->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>  
                @endforeach
                  
                 
               
            </div>
        </section>
        
    @endsection
   
@endsection