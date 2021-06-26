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
    @endsection
   
@endsection