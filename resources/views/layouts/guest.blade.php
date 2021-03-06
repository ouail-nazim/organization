@extends('layouts.app')
@section('style')
  @yield('mainStyle')    
@endsection
@section('content')
  @include('comp.topHeader')
  @include('comp.sideBar')

  @yield('main')
  @include('comp.footer')
@endsection

@section('javascript')
    @yield('javascript')
@endsection
