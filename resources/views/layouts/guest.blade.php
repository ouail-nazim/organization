@extends('layouts.app')
@section('content')
  @include('comp.topHeader')
  @yield('main')
  @include('comp.footer')
@endsection

@section('javascript')
    @yield('javascript')
@endsection
