<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="shortcut icon" href="/front/images/favicon_new.ico" type="image/png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/admin-assets/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/admin-assets/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

  <link rel="stylesheet" href="{{asset('/admin-assets/select2/css/select2.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('/admin-assets/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admin-assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/admin-assets/custom.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="/admin-assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Site</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <!-- <img src="{{asset('admin-assets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"> -->
                <!-- <span class="hidden-xs">{{ucfirst (Auth::user()->name) }} </span> -->
                 <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="/admin-assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    {{ ucfirst(Auth::user()->name) }}

                    </h3>
                    <p class="text-sm"> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="float-right text-sm text-danger"><i class="fas fa-sign-out-alt"></i></a>
                        <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form></p>
                    {{-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> --}}
                  </div>
                </div>
                <!-- Message End -->
              </div>
              <div class="dropdown-divider"></div>

            </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
      {{-- <img src="{{asset('front/images/favicon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Admin panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin-assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('teacher.index')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Teacher
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('study-abroad.index')}}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Study abroad
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Courses
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-list-alt "></i>
                  <p>
                    Categories
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('course.index')}}" class="nav-link">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('lesson.index')}}" class="nav-link">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Lessons</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{route('admin.exams')}}" class="nav-link">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Exams</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.testimonials')}}" class="nav-link">
              <i class="nav-icon fa fa-quote-left"></i>
              <p>
                Testimonials
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.page')}}" class="nav-link">
              <i class="nav-icon fas fa-pager"></i>
              <p>
                Pages
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.appels')}}" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Appels
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 @yield('content')

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('admin-assets/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/admin-assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/admin-assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('/admin-assets/dist/js/adminlte.js')}}"></script>
<script src="{{asset('/admin-assets/select2/js/select2.full.min.js')}}"></script>
<!-- PAGE PLUGINS -->

<!-- dropzonejs -->
<script src="{{asset('/admin-assets/dropzone/min/dropzone.min.js')}}"></script>
<!-- jQuery Mapael -->
<!-- <script src="/admin/jquery-mapael/maps/usa_states.min.js"></script> -->

<!-- AdminLTE for demo purposes -->
<script src="{{asset('/admin-assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/admin-assets/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('/admin-assets/custom.js')}}"></script>
</body>
</html>
