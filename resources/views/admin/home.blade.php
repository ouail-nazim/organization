@extends('admin.master')

@section('main-content')

    @section('content_header')
        <h1>Administration Dashboard</h1>
    @endsection
    
    @section('content')
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <section class="content">
            <div class="row">
                {{-- Meetings --}}
                <div class="col-lg-4 col-md-6  col-12">
                  <div class="small-box bg-gray">
                    <div class="inner">
                      <h3>{{$meetings}}</h3>
                      <p>Meetings</p>
                    </div>
                    <div class="icon">
                      
                      <i class="far fa-handshake    "></i>
                    </div>
                    <a href="{{route("admin.meetings.list")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>    
                {{-- News --}}
                <div class="col-lg-4 col-md-6  col-12">
                    <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>{{$news}}</h3>
                        <p>News</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-newspaper    "></i>
                    </div>
                    <a href="{{route("admin.news.list")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- Goals --}}
                <div class="col-lg-4 col-md-6  col-12">
                    <div class="small-box bg-maroon">
                        <div class="inner">
                        <h3>{{$goals/2}}</h3>
                        <p>Goals</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-bullseye"></i>
                        </div>
                        <a href="{{route("admin.goals.list")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- Members --}}
                <div class="col-lg-4 col-md-6  col-12">
                    <div class="small-box bg-teal">
                        <div class="inner">
                        <h3>{{$members}}</h3>
                        <p>Members</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-users"></i>
                        </div>
                        <a href="{{route("admin.members.list")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- Grades --}} 
                <div class="col-lg-4 col-md-6  col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h3>{{$grades}}</h3>
                        <p>Grade</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chess-queen"></i>
                        </div>
                        <a href="{{route("admin.grades.list")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- Email Received --}}
                <div class="col-lg-4 col-md-6  col-12">                    
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>{{$emails}}</h3>
                        <p>Email Received</p>
                        </div>
                        <div class="icon">
                        <i class="far fa-envelope"></i>
                        </div>
                        <a href="{{route("admin.mailbox.inbox")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        
    @endsection
   
@endsection