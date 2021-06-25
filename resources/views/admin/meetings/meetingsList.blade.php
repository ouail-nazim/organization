@extends('admin.master')

@section('main-content')
    @section('style')
        <style>
            
            .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: #fff;
                background-color:var(--success);
            }
        </style>
    @endsection

    @section('content_header')
            <h1>Meetings List</h1>
    @endsection
    @section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body pb-0">
            <div class="row">
              <div class="timeline">
                @foreach ($meetings as $item)
                    <div>
                    <i class="fas fa-handshake bg-success"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> {{$item->created_at->diffForHumans()}}</span>
                        <h3 class="timeline-header"><a href="#" class="text-success">Meeting </a></h3>
                        <div class="timeline-body row text-right">
                            <div class="col-5">
                                <img src="{{$item->cover}}" alt="cover" class="rounded-md" style="max-width: 100%;max-height: 400px">
                            </div>
                            <div class="col-7">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="pills-ar-Meeting-{{$item->id}}" data-toggle="pill" href="#arMeeting{{$item->id}}" role="tab" aria-controls="pills-home" aria-selected="true">ar</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="pills-en-Meeting-{{$item->id}}" data-toggle="pill" href="#enMeeting{{$item->id}}" role="tab" aria-controls="pills-profile" aria-selected="false">en</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="arMeeting{{$item->id}}" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div>
                                            <strong>{{$item->ar_title}}</strong>                    
                                            <p>{{$item->ar_description}}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="enMeeting{{$item->id}}" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="text-left">
                                            <strong>{{$item->en_title}}</strong>
                                            <p>{{$item->en_description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-footer d-flex flex-row-reverse">
                        <a href="{{route('admin.meeting.edit',['meeting'=>$item->id])}}" class="btn btn-primary btn-sm mx-2">Edit</a>

                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMeeting{{$item->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>

                        <!-- Modal to delete Meeting -->
                        <div class="modal fade" id="deleteMeeting{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Meeting num : {{$item->id}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body text-left">
                                    if are you sure, press on <strong class="text-danger">Delete</strong> to delete this Meeting
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{route('admin.meeting.destroy',['meeting'=>$item->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    </div>
                @endforeach
                <div>
                  <i class="fas fa-clock bg-gray"></i>
                </div>
              </div>      
            </div>
          </div>
          <!-- /.card-body -->
          @if($meetings->count() > 0)
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0"> 
                    <li class="page-item   @if($meetings->currentPage() == 1) disabled @endif ">
                        <a class="page-link @if($meetings->currentPage() != 1) text-success @endif"
                             href="{{ $meetings->previousPageUrl() }}">Previous</a>
                    </li>                   
                    
                    <li class="page-item disabled">
                        <p class="page-link text-dark">
                            page {{ $meetings->currentPage() }} of {{ $meetings->lastPage() }}
                        </p>
                    </li>
                    <li class="page-item @if($meetings->currentPage() == $meetings->lastPage()) disabled @endif">
                        <a class="page-link @if($meetings->currentPage() != $meetings->lastPage()) text-success @endif" 
                             href=" {{ $meetings->nextPageUrl() }}">next</a>
                    </li>
                </ul>
                </nav>
            </div>
          @endif        
        </div>
      </section>
    @endsection
   
@endsection