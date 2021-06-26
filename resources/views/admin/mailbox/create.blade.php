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
            <h1>Compose</h1>
    @endsection
    @section('content')
    <section class="content">
        <div class="row">
          <div class="col-md-3">
            <a href="{{route('admin.mailbox.inbox')}}" class="btn btn-success btn-block mb-3">Back to Inbox</a>
            @include('admin.mailbox.folders')
          </div>          
          <div class="col-md-9">
            <form method="post" action="{{route('admin.mailbox.composer')}}" class="card card-success card-outline">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Compose New Message</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input name="to" type="email" class="form-control" placeholder="To:" required  value="{{old("to")}}" />
                        @error('to')
                            <div class="my-1 text-danger">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input name="subject" type="text" class="form-control" placeholder="Subject:" required  value="{{old("subject")}}" />
                        @error('subject')
                            <div class="my-1 text-danger">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="message" required class="form-control" style="height: 250px;">{{old("message")}}</textarea>
                        @error('message')
                            <div class="my-1 text-danger">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 
                </div>
                <div class="card-footer">
                    <div class="float-right">                        
                        <button type="submit" class="btn btn-success"><i class="far fa-envelope"></i> Send</button>
                    </div>
                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                </div>
            </form>
        </div>
      </section>
    @endsection
@endsection