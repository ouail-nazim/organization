@extends('admin.master')

@section('main-content')
    @section('style')
        <style>
            .user-avatar{
                height: 100px;
                border-radius: 50%;

            }
        </style>
    @endsection

    @section('content_header')
            <h1>Members List</h1>
    @endsection
    @section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body pb-0">
            <div class="row">
              @forelse ($members as $member)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h2 class="lead"><b>{{$member->name}}</b></h2>
                                    <p class="text-muted text-sm"><b>Grade: </b> {{$member->grade->grade}} </p>
                                    <p class="text-muted text-sm"><b><i class="fa fa-envelope" aria-hidden="true"></i> Email: </b> <br> {{$member->email}} </p>
                                    <p class="text-muted text-sm"><b><i class="fa fa-mobile-alt" aria-hidden="true"></i> Phone: </b> <br> {{$member->phone}} </p>     
                                </div>
                                <div class="col-4 text-center">
                                    <img src="{{$member->avatar}}" alt="user-avatar" class="user-avatar img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                            
                            <a href="{{route('admin.member.edit',['member'=>$member->id])}}"  class="btn btn-sm btn-primary">
                                <i class="fas fa-edit mx-1"></i>Edit
                            </a>
                            
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMember{{$member->id}}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
  
                            <!-- Modal to delete member -->
                            <div class="modal fade" id="deleteMember{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete member num : {{$member->id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        if are you sure, press on <strong class="text-danger">Delete</strong> to delete this member
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{route('admin.member.destroy',['member'=>$member->id])}}" method="post">
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
                </div>
               
              @empty
                  <div class="d-flex justify-content-center col-12 ">
                        <p class=" text-center ">
                            <strong>no member is founded</strong>
                            <br>
                            <a href="{{route("admin.add.member")}}" class="btn btn-success my-2">
                                Add Member
                            </a>
                        </p>
                  </div>
              @endforelse
             
             
            </div>
          </div>
          <!-- /.card-body -->
          @if($members->count() > 0)
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0"> 
                    <li class="page-item @if($members->currentPage() == 1) disabled @endif ">
                        <a class="page-link" href="{{ $members->previousPageUrl() }}">Previous</a>
                    </li>                   
                    
                    <li class="page-item disabled">
                        <p class="page-link text-dark">
                            page {{ $members->currentPage() }} of {{ $members->lastPage() }}
                        </p>
                    </li>
                    <li class="page-item @if($members->currentPage() == $members->lastPage()) disabled @endif">
                        <a class="page-link "  href=" {{ $members->nextPageUrl() }}">next</a>
                    </li>
                </ul>
                </nav>
            </div>
          @endif        
        </div>
      </section>
    @endsection
   
@endsection