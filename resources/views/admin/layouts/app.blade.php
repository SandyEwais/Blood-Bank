
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood Bank</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminLte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Blood Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminLte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon 	fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @can('article-access')
          <li class="nav-item">
            <a href="{{route('articles.index')}}" class="nav-link">
              <i class="far fa-newspaper nav-icon"></i>
              <p>Articles</p>
            </a>
          </li>
          @endcan
          @can('category-access')
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="fas fa-boxes nav-icon"></i>
              <p>Categories</p>
            </a>
          </li>
          @endcan
          @can('client-access')
          <li class="nav-item">
            <a href="{{route('clients.index')}}" class="nav-link">
              <i class="nav-icon 	fas fa-users"></i>
              <p>
                Clients
              </p>
            </a>
          </li>
          @endcan
          @can('governorate-access')
          <li class="nav-item">
            <a href="{{route('governorates.index')}}" class="nav-link">
              <i class="nav-icon 	fas fa-map-marked"></i>
              <p>
                Governorates
              </p>
            </a>
          </li>
          @endcan
          @can('city-access')
          <li class="nav-item">
            <a href="{{route('cities.index')}}" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Cities
              </p>
            </a>
          </li>
          @endcan
          @can('donationRequest-access')
          <li class="nav-item">
            <a href="{{route('donation-requests.index')}}" class="nav-link">
              <i class="nav-icon	fas fa-comment-medical"></i>
              <p>
                Donation Requests
              </p>
            </a>
          </li>
          @endcan
          
          @can('contactMessage-access')
          <li class="nav-item">
            <a href="{{route('contact-messages.index')}}" class="nav-link">
              <i class="nav-icon	fas fa-envelope-square"></i>
              <p>
                Contact Messages
              </p>
            </a>
          </li>
          @endcan
          
          @can('user-access')
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endcan
          @can('role-access')
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="nav-icon fa fa-user-tag"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan
          @can('setting-access')
          <li class="nav-item">
            <a href="{{route('settings.index')}}" class="nav-link">
              <i class="nav-icon	fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          @endcan
          
          
          
          @auth
          <li class="nav-item">
            <a href="{{route('reset')}}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Reset Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            {!! Form::open([
              'route' => 'user.logout'
            ]) !!}
            {!! Form::button('<i class="fas fa-power-off"></i> Logout', ['class' => 'nav-link','type' => 'submit']) !!}
            {!! Form::close() !!}
          </li>
          @endauth
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              @yield('page-name')
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('page-name')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          @yield('content')
      </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    @yield('footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminLte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLte/dist/js/adminlte.min.js')}}"></script>
@stack('selectAll');
</body>
</html>
