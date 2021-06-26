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
            <h1>Inbox</h1>
    @endsection
    @section('content')
    <section class="content">
        <div class="row">
          <div class="col-md-3">
            <a href="compose.html" class="btn btn-success btn-block mb-3">Compose</a>
            @include('admin.mailbox.folders')
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Inbox</h3>
  
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search Mail">
                    <div class="input-group-append">
                      <div class="btn btn-primary">
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="mailbox-controls">
                  <!-- Check all button -->
                  <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="far fa-trash-alt"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-reply"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-share"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-sync-alt"></i>
                  </button>

                  {{-- pagination --}}

                  <div class="float-right">
                    {{$messages->firstItem()}}-{{$messages->lastItem()}}/{{$messages->total()}}
                    
                    <div class="btn-group">
                      <a href="{{$messages->previousPageUrl()}}" class="btn btn-default btn-sm  @if($messages->currentPage() == 1) disabled @endif ">
                        <i class="fas fa-chevron-left"></i>
                      </a>
                      <a href="{{$messages->nextPageUrl()}}" class="btn btn-default btn-sm  @if($messages->currentPage() == $messages->lastPage()) disabled @endif">
                        <i class="fas fa-chevron-right"></i>
                      </a>
                    </div>
                    <!-- /.btn-group -->
                  </div>
                  <!-- /.float-right -->
                </div>
                <div class="table-responsive mailbox-messages">
                  <table class="table table-hover table-striped">
                    <tbody>
                    @foreach ($messages as $item)
                        <tr class="@if($item->isReaded) text-black-50 @else font-weight-bold @endif">
                            <td class="mailbox-star"><a href="#add{{$item->id}}"><i class=" @if($item->isFavorite) fas @else far @endif  fa-star text-warning"></i></a></td>
                            <td class="mailbox-name">{{$item->firstName }}</td>
                            <td class="mailbox-subject">{{$item->subject}}

                            </td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date">{{$item->created_at->diffForHumans()}}</td>
                            @if(!$item->trashed())
                                <td >
                                    <form action="{{route("admin.mailbox.destroy",["message"=>$item->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-default btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </td>
                            @endif
                      </tr>
                    @endforeach
                    
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endsection
@endsection