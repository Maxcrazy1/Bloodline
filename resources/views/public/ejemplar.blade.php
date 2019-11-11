<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos del ejemplar - {{$details["Detalles"]['name']}} </title>
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ejemplar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/css/all.min.css') }}">
    <link href="{{$page["urlFont"]}}" rel="stylesheet">
    {{-- @include('public.personal-ejemplar') --}}

</head>
<style>

</style>

<body>
    @include('public.components.menu')
    <div class="container-fluid bg-image">

        {{-- Datos del ejemplar --}}
        <div class="row bg-claro">
            @include('public.subview.details')
            @include('public.subview.media')
            @include('public.subview.parents')
        </div>

        {{-- Familia del ejemplar --}}
        <div class="row mt-5">
            @include('public.subview.padres')
            @include('public.subview.abuelos')
            @include('public.subview.bisaAbuelos')
        </div>
    </div>

   @include('public.components.footer')
    <script type="text/javascript" src="{{ URL::asset('js/public/images.js') }}"></script>
    <script src="{{ URL::asset('js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>

</body>

</html>