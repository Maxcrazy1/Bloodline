<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Compiled and minified Bootstrap CSS -->
    <script src="{{ asset('js/core/jquery.min.js') }}" ></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/css/all.min.css') }}">

        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @stack('styles')
   
    <title>Ejemplares - @yield('title')</title>
</head>

<body>
    @include('public.components.menu')
    @yield('content')

    @include('public.modal')


    @include('public.components.footer')
    
    


    <script src="{{ URL::asset('js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>

    
</body>

</html>