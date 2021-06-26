@extends('adminlte::page')

@section('css')
  <link rel="shortcut icon" href="{{setting('logo_cover')}}" type="image/x-icon"/>
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @yield('style')
@stop

@section('title')
  {{_('admin pannel')}} | {{setting("app_name")}}
@endsection
{{-- content_top_nav_left --}}
@section('content_top_nav_left')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route("admin.home")}}" class="nav-link">
          {{__('Dashboard')}} 
        </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route("home")}}" class="nav-link">
        {{__('Web Site Home')}} 
      </a>
    </li>
@endsection
{{-- content_top_nav_right --}}
@section('content_top_nav_right')

  <a class="nav-link" href="{{route("admin.mailbox.inbox")}}">
    <i class="far fa-comments"></i>
    @if(\App\Models\Message::where('type', 'receive')->where("isReaded", 0)->count() > 0)
      <span class="badge badge-danger navbar-badge">
        {{\App\Models\Message::where('type', 'receive')->where("isReaded", 0)->count()}}
      </span>
    @endif
  </a>  

@endsection
@section('usermenu_header')
  <a href="#" class="dropdown-item docs-creator m-1">
    <i class="fas fa-user mr-2"></i> Profile
  </a>
  <a href="#" class="dropdown-item docs-creator m-1">
    <i class="fas fa-cogs mr-2"></i> Modifier mon profile
  </a>
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
            {{-- goals --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bullseye"></i>
                <p>
                  Goals
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route("admin.goals.list")}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Goals list</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route("admin.add.goal")}}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Goals</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- members && grads --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                  Members
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route("admin.members.list")}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Members list</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route("admin.add.member")}}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Member</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chess-queen"></i>
                    <p>
                      Grades
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route("admin.grades.list")}}" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Grades list</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route("admin.add.grade")}}" class="nav-link">
                        <i class="fas fa-plus-circle nav-icon"></i>
                        <p>Add Grades</p>
                      </a>
                    </li>
                  </ul>
                </li> 
              </ul>
            </li> 
            {{-- news --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  News
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route("admin.news.list")}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>News list</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route("admin.add.news")}}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add News</p>
                  </a>
                </li>
              </ul>
            </li> 
            {{-- meetings --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-handshake"></i>
                <p>
                  Meetings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route("admin.meetings.list")}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Meetings list</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route("admin.add.meetings")}}" class="nav-link">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Meeting</p>
                  </a>
                </li>
              </ul>
            </li> 
            {{-- mailbox --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Mailbox 
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route("admin.mailbox.inbox")}}" class="nav-link">
                    <i class="fas fa-inbox nav-icon"></i>
                    <p>Inbox</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route("admin.mailbox.composer")}}" class="nav-link">
                    <i class="fas fa-paper-plane nav-icon"></i>
                    <p>Composer</p>
                  </a>
                </li>
                
              </ul>
            </li> 
            {{-- Setting --}}
            <li class="nav-item">
              <a href="{{route("admin.setting")}}" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Setting
                </p>
              </a>
            </li>          
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
@endsection

@yield('main-content')



@section('footer')
   
    <strong>Copyright &copy; 2020-2021 <a href="#" class="text-success" >{{setting('app_name')}}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> {{setting('app_version')}}
    </div>
   
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@stop