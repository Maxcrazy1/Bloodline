<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Laravel - @yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/css/all.min.css') }}">
    @yield('styles')

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-6.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Logo de la app
                    </a>
                </div>
                <ul class="nav">
                    <li class= "{{ (request()->is('dashboard')) ? 'nav-item active' : '' }}">
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <i class="far fa-chart-bar"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class= "{{ (request()->is('ejemplares')) ? 'nav-item active' : '' }}">

                    
                        <a class="nav-link" href="{{ url('/ejemplares') }}">
                            <i class="fas fa-dog"></i>
                            <p>Ejemplares</p>
                        </a>
                    </li>
                    <li class= "{{ (request()->is('paginas')) ? 'nav-item active' : '' }}">
                    
                        <a class="nav-link" href="{{ url('/paginas') }}">
                            <i class="fas fa-globe"></i>
                            <p>Paginas</p>

                        </a>
                    </li>
                    <li class= "{{ (request()->is('')) ? 'nav-item active' : '' }}">
                    
                    
                        <a class="nav-link" href="./typography.html">
                            <i class="fas fa-cogs"></i>
                            <p>Ajustes</p>

                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Admin</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="no-icon">Opciones</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Ediar perfil</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Cerrar sesión</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>

                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> DERECHOS RESERVADOS. REALIZADO POR <a class="link"
                                href="https://club.colorfussionkc.com/">COLOR FUSSION</a>
                        </p>
                    </nav>
                </div>
            </footer>
        </div>




    </div>


    </div>
    </div>

</body>
<!--   Core JS Files   -->

@include('admin.scripts-drag')
{{-- <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
<!--  Chartist Plugin  -->
{{-- <script src="{{ asset('js/plugins/chartist.min.js') }}"></script> --}}
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
{{-- <script src="{{ asset('js/demo.js') }}"></script> --}}
<script src="{{ asset('js/admin/buscador.js') }}"></script>


{{-- <script type="text/javascript">
    $(document).ready(function() {
        demo.initDashboardPageCharts();

    });
</script> --}}

</html>