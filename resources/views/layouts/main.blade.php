<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{asset('/')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
    </style>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- fancyBox CSS -->
    <link href="node_modules/@fancyapps/ui/dist/fancybox/fancybox.css" rel="stylesheet">

    <title>Novella</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="images/mainPhotos/Mika.png" alt="Logo" height="100" width="70">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light" style="font-family: 'Satisfy', cursive;">
        <!-- Left navbar links -->
        <ul class="navbar-nav d-flex w-auto">
            <li class="nav-item">
                <a class="nav-link fs-2 pl-4" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>


            <li class="nav-item ml-3">
                <a class="navbar-brand text-white fs-2" href="{{ url('/') }}">
                    Hush
                </a>
            </li>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

        </ul>
        <ul class="navbar-nav ms-auto align-items-center mr-2">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item ">
                        <a class="nav-link text-white fs-5" style="font-family: 'Satisfy', cursive;"
                           href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" style="font-family: 'Satisfy', cursive;"
                           href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown" class="nav-link h-25 dropdown-toggle text-white text-center" style="font-size: calc(13px + 7 *(100vw / 1200))"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end text-center fs-5"
                         aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

        <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                @can('view', auth()->user())
                    <div class="image">
                        <img class="img-circle elevation-2"
                             src="images/profile_image/{{Auth::user()->image}}" alt="logo">
                    </div>

                    <div class="info">
                        <a id="navbarDropdown" class="nav-link fs-5"
                           href="{{route('main.user.index', Auth::user()->id )}}"
                           aria-expanded="false">{{ Auth::user()->name }}</a>
                    </div>
                @endcan
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('main.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Все посты
                                <span class="badge badge-info right">{{\App\Models\Post::all()->count() }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Пользователи
                                <span class="badge badge-info right">{{\App\Models\User::all()->count() }}</span>
                            </p>
                        </a>
                    </li>
                    @can('view', auth()->user())
                    <li class="nav-item">
                        <a href="{{route('main.user.index', auth()->user()->id)}}" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Профиль
                            </p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-image: url({{ asset('images/mainPhotos/fon.jpg')}}); background-repeat: repeat">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content pt-3">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <section class="col-lg-7 connectedSortable container">
                        @yield('content')

                    </section>

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer bg-dark">
        <strong>Copyright &copy; 2023 || All rights reserved. </strong>

        <div class="float-right d-none d-sm-inline-block">
            <b>Handcrafted by <a class="text-white" href="https://vk.com/belan29">Why Mika?</a> </b>
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>


<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- fancyBox JS -->
<script>
    $('#imageModal').on('show.bs.modal', function (event) {
        var clickedImageSrc = $(event.relatedTarget).attr("src");
        $("#modalImage").attr("src", clickedImageSrc);
    });
</script>
</body>
</html>
