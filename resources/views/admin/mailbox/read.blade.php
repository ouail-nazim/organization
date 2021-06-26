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
            <h1>Read Mail</h1>
    @endsection
    @section('content')
    <section class="content">
        <div class="row">
          <div class="col-md-3">
            <a href="{{route('admin.mailbox.inbox')}}" class="btn btn-success btn-block mb-3">Back to Inbox</a>
            @include('admin.mailbox.folders')
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-success card-outline">
                    <div class="card-header">
                      <h3 class="card-title">Read Mail</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <div class="mailbox-read-info">
                        <h5>Message Subject : {{$message->subject}}</h5>
                        <h6>From: {{$message->firstName}}@if ($message->type != "sent") {{$message->lastName}} @endif
                          <br>
                          @if ($message->type == "sent") To: @endif<em class="text-success">{{$message->email}} </em>
                          <span class="mailbox-read-time float-right">{{$message->created_at->diffForHumans()}}</span>
                        </h6>
                      </div>
                      <!-- /.mailbox-read-info -->
                      <div class="mailbox-controls with-border text-center">
                        <h3>Message</h3>
                      </div>
                      <!-- /.mailbox-controls -->
                      <div class="mailbox-read-message overflow-auto" style="max-height: 350px">
                        {{$message->message}}
                      </div>
                      <!-- /.mailbox-read-message -->
                    </div>
                    
                    <!-- /.card-footer -->
                    <div class="card-footer d-flex">
                        <form action="{{route("admin.mailbox.destroy",["message"=>$message->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                        </form>
                        <form action="{{route("admin.mailbox.pdf",["message"=>$message->id])}}" method="post">
                          @csrf
                          <button type="submit" class="btn btn-default mx-1"><i class="fas fa-print"></i> Print</button>
                        </form>
                      
                    </div>
                    <!-- /.card-footer -->
                  </div>
          </div>
        </div>
      </section>
    @endsection
@endsection