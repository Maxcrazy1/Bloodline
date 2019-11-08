<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/core/jquery.min.js') }}"></script>
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tree.css') }}" rel="stylesheet">
    <link href="{{$datos["urlFont"]}}" rel="stylesheet">
    {{-- @include('public.personal-arbol') --}}

    <title>Simulación de ejemplares</title>

</head>

<body>
    @include('public.components.menu')


    <div class="img-top">
        @if ($datos["media"][0]->src!="")
        <img class="imagen" src="{{URL::asset('/media/pages/'.$datos["media"][0]->src)}}" alt="" />
        @else
        <img class="imagen" style="background-color:#dbdbdb;" alt="" />
        @endif
    </div>

    <div class="bg-image">
        <div class="bg-texture">
            <div class="text-center">
                <h5 class="display-4 principal">Simulación de cruza</h5>
                <h4 class="mt-5 padres">Padres 2da. Generación</h4>
            </div>

            <div class="container-fluid mb-5">
                @include('public.subview.arbol-padres')
                @include('public.subview.arbol-abuelos')
            </div>
        </div>
    </div>

    @include('public.components.footer')
    <script type="text/javascript" src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>
</body>

</html>