<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/css/all.min.css') }}">
    @include('public.components.icon')

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">

    @stack('styles')

    <title>BloodLine - @yield('title')</title>
</head>

<body>
    @include('public.components.menu')
    @yield('content')
    @include('public.modal')
    @include('public.components.footer')


    <script src="{{ URL::asset('js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/core/popper.min.js.map') }}"></script>
    <script src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/btnMenu.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js.map') }}" type="text/javascript"></script>


</body>

</html>