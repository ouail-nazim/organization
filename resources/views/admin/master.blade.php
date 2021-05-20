@extends('adminlte::page')

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('title', 'Enseignant')
{{-- content_top_nav_left --}}
@section('content_top_nav_left')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">About</a>
    </li>
@endsection
{{-- content_top_nav_right --}}
@section('content_top_nav_right')
    <form class="form-inline ml-3">
        {{-- @csrf --}}
        <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
  </form>
@endsection


@section('left-side-bar')
    <!-- Brand Logo -->
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif
    
      <!-- Sidebar -->
      <div class="sidebar">
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                  Mes etudiantes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./listDesBinomes.html" class="nav-link">
                    <i class="fas fa-people-arrows nav-icon"></i>
                    <p>List des binomes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./addnewBinome.html" class="nav-link">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>Ajouter un binome</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-folder-open"></i>
                <p>
                  Mes Documents
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./document_list.html" class="nav-link">
                    <i class="fas fa-file nav-icon"></i>
                    <p>List des documents</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./addnewDocument.html" class="nav-link">
                    <i class="fas fa-file-medical nav-icon"></i>
                    <p>Ajouter un docuemnt</p>
                  </a>
                </li>
              </ul>
            </li>  
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-paperclip"></i>
                <p>
                  Mes Brouillons
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-sticky-note nav-icon"></i>
                    <p>List des Brouillons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
                    <i class="fas fa-file-medical nav-icon"></i>
                    <p>Ajouter un Brouillon</p>
                  </a>
                </li>
              </ul>
            </li>            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
@endsection

@yield('main-content')

@section('footer')
    <strong>Copyright &copy; 2020-2021 <a href="#">{{config('app.name')}}</a>.</strong>
        All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> Beta 1.0
    </div>
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@stop