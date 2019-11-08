<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    @include('public.components.icon')
    <link rel="icon" type="image/png" href="{{URL::asset('/media/pages/sidebar.jpg')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <title>Bloodline - @yield('title')</title>


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/alertify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/themes/default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/explorer-fas/theme.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="{{ asset('css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

    @yield('styles')
</head>

<body>
    <div class="wrapper">

        {{-- Menu lateral --}}
        @include('admin.components.sidebar')
        
        <div class="main-panel">
            <!-- Navbar -->
            @include('admin.components.navbar')

            {{-- Contenido dinamico del sitio --}}
            @include('admin.components.content')
            
            {{-- Footer del sitio --}}
            @include('admin.components.footer')
        </div>
    </div>
</body>

@include('public.modal')
@include('admin.scripts-drag')

<!--   Core JS Files   -->
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>


<script src="{{ asset('js/alertify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>

@yield('scripts')

</html>