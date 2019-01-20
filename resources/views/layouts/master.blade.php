<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('companyName')</title>

  <link rel="stylesheet" href="/css/app.css">
  <link rel="shortcut icon" href="{{ asset('img/rocket.png')}}" type="image/x-icon">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Brand Logo -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/rocket.png')}}" class="img-circle elevation-2" alt="Logo Image">
        </div>
        <div class="info">
          <a href="/home" class="d-block">@yield('companyName')</a>
        </div>
      </div>
      <!-- Person Logo -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('img/man.png')}}" class="img-circle elevation-2" alt="Logo Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if ( $company->master_id == Auth::user()->id)
            <li class="nav-item">
              <a href="/home/createUser" class="nav-link">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Create user</p>
              </a>
            </li>
          @else
            <li class="nav-item has-treeview">
              <a href="/home/bill" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                  Add Bill
                </p>
              </a>
            </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('pageName')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              @yield('breadcrumb')

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
          @if ($errors->has('fatal'))
              <div class="row primary_info_row">
                  <div class="col">
                      <div class="alert alert-danger" role="alert">
                          {{ $errors->first('fatal') }}
                      </div>
                  </div>
              </div>
          @elseif($errors->any())
              <div class="row primary_info_row">
                  <div class="col">
                      <div class="alert alert-danger" role="alert">
                          {{ $errors }}
                      </div>
                  </div>
              </div>
          @endif
          @if (\Session::has('success'))
              <div class="row primary_info_row">
                  <div class="col">
                      <div class="alert alert-success" role="alert">
                          {{ \Session::get('success') }}
                      </div>
                  </div>
              </div>
          @endif
          
        @yield('mainContent')

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="https://freelansim.ru/freelancers/Loafer19">Loafer19</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- Loafer -->
<script src="/js/app.js"></script>

@yield('scripts')

</body>
</html>
