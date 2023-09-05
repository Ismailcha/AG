<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.css">
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->

            <ul class="navbar-nav">
                <li class="nav-item" style="margin-right: 100px">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="#" class="dropdown-item">
                            <i class="mr-2 fas fa-file"></i>
                            {{ __('My profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="mr-2 fas fa-sign-out-alt"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                    <img src="{{ asset('images/software-engineer.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                @else
                    <img src="{{ asset('images/client.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                @endif
                <span class="brand-text font-weight-light">Gestion des Offre</span>
            </a>




        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        {{-- <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            IMAD EDDINE
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 <a href="https://adminlte.io">DOCTIZOL.io</a>.</strong> All rights reserved.
    </footer> --}}
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @vite('resources/js/app.js')
    <!-- AdminLTE App -->

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    @stack('scripts') <!-- Include the scripts defined in the view file -->
</body>

</html>
