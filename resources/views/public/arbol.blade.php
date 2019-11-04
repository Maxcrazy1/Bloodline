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



    <title>Simulación de ejemplares</title>
    @include('public.personal-arbol')

</head>

<body>
    @include('layouts.menu')


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
            <div class="container-fluid">

                {{-- padres --}}
                <div class="row">
                    <div class="col2">
                        <div class="card card2 mt-5" style="width: 25rem; ">
                            @if (count($datos["family"]["Ejemplar Macho"])>0)

                            <h4 class="card-title padres">
                                {{ $datos["family"]["Ejemplar Macho"][0]->name}}
                            </h4>
                            <a href="/Ejemplar/{{$datos["family"]["Ejemplar Macho"][0]->slug}}">

                                @if (count($datos["family"]["Ejemplar Macho"][0]->medias)>0)
                                <img src="{{URL::asset('/media/'.$datos["family"]["Ejemplar Macho"][0]->medias[0]->src)}}"
                                    class="card-img">
                                @else

                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img">
                                @endif
                            </a>

                            <div class="card-body padre-s">
                                <p class="quit">{{$datos["family"]["Ejemplar Macho"][0]->raza}}</p>
                                <p class="quit">{{$datos["family"]["Ejemplar Macho"][0]->genre}}</p>
                            </div>

                            @else

                            <h5 class="card-title text-center">No existen registros</h5>
                            <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img">
                            <p class="quit"> </p>
                            <p class="quit"></p>

                            @endif
                        </div>
                    </div>


                    <div class="col2">
                        <div class="card card2 mt-5" style="width: 25rem; ">
                            @if (count($datos["family"]["Ejemplar Hembra"])>0)

                            <h4 class="card-title padres">
                                {{$datos["family"]["Ejemplar Hembra"][0]->name}}
                            </h4>

                            <a href="/Ejemplar/{{$datos["family"]["Ejemplar Hembra"][0]->slug}}">
                                @if (count($datos["family"]["Ejemplar Hembra"][0]->medias)>0)
                                <img src="{{URL::asset('/media/'.$datos["family"]["Ejemplar Hembra"][0]->medias[0]->src)}}"
                                    class="card-img" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img" alt="...">
                                @endif
                            </a>
                            <div class="card-body padre-s">
                                <p class="quit">{{$datos["family"]["Ejemplar Hembra"][0]->raza}}</p>
                                <p class="quit">{{$datos["family"]["Ejemplar Hembra"][0]->genre}}</p>
                            </div>
                            @else
                            <h5 class="card-title text-center">No existen registros</h5>
                            <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img" alt="...">
                            <p class="quit"> </p>
                            <p class="quit"></p>

                            @endif
                        </div>




                    </div>
                </div>

                {{-- Abuelos --}}
                <div class="row">
                    <div class="col2">
                        <h5 class="abuelos">Abuelos (3ra. Generación)</h3>
                    </div>
                    <div class="col2">
                        <h5 class="abuelos">Abuelos (3ra. Generación)</h3>
                    </div>
                    <div class="col4">

                        <div class="card card2 mt-3 card-der" style="width: 14rem; ">
                            @if (count($datos["family"]["Macho"][0]["Segunda generacion"])>0)
                            <h4 class="card-title abuelos">
                                {{ $datos["family"]["Macho"][0]["Segunda generacion"][0]->name}}
                            </h4>

                            <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Segunda generacion"][0]->slug}}">
                                @if (count($datos["family"]["Macho"][0]["Segunda generacion"][0]->medias)>0)
                                <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Segunda generacion"][0]->medias[0]->src)}}"
                                    class="card-img2" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img" alt="...">
                                @endif
                            </a>
                            <div class="card-body">

                            </div>
                            @else
                            <h5 class="card-title text-center">No existen registros</h5>
                            <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                            <div class="card-body">

                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="col4">

                        <div class="card card2 mt-3 card-der" style="width: 14rem; ">
                            @if (count($datos["family"]["Macho"][0]["Segunda generacion"])>1)
                            <h4 class="card-title abuelos">
                                {{ $datos["family"]["Macho"][0]["Segunda generacion"][1]->name}}
                            </h4>

                            <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Segunda generacion"][1]->slug}}">
                                @if (count($datos["family"]["Macho"][0]["Segunda generacion"][1]->medias)>0)

                                <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Segunda generacion"][1]->medias[0]->src)}}"
                                    class="card-img2" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                @endif
                            </a>
                            <div class="card-body">

                            </div>
                            @else
                            <h5 class="card-title text-center">No existen registros</h5>
                            <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                            <div class="card-body">

                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col4">

                        <div class="card card2 mt-3 card-der" style="width: 14rem; ">
                            @if (count($datos["family"]["Hembra"][0]["Segunda generacion"])>0)
                            <h4 class="card-title abuelos">
                                {{ $datos["family"]["Hembra"][0]["Segunda generacion"][0]->name}}
                            </h4>

                            <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Segunda generacion"][0]->slug}}">
                                @if (count($datos["family"]["Hembra"][0]["Segunda generacion"][0]->medias)>0)

                                <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Segunda generacion"][0]->medias[0]->src)}}"
                                    class="card-img2" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                @endif
                            </a>
                            <div class="card-body">

                            </div>
                            @else
                            <h5 class="card-title text-center">No existen registros</h5>
                            <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                            <div class="card-body">

                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col4">

                        <div class="card card2 mt-3 card-der" style="width: 14rem; ">
                            @if (count($datos["family"]["Hembra"][0]["Segunda generacion"])>1)
                            <h4 class="card-title abuelos">
                                {{ $datos["family"]["Hembra"][0]["Segunda generacion"][1]->name}}
                            </h4>

                            <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Segunda generacion"][1]->slug}}">
                                @if (count($datos["family"]["Hembra"][0]["Segunda generacion"][1]->medias)>0)

                                <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Segunda generacion"][1]->medias[0]->src)}}"
                                    class="card-img2" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                @endif
                            </a>
                            <div class="card-body">

                            </div>
                            @else
                            <h5 class="card-title text-center">No existen registros</h5>
                            <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                            <div class="card-body">

                            </div>
                            @endif
                        </div>
                    </div>


                </div>

                {{-- Bisabuelos --}}
                <div class="row">
                    <div class="col2">
                        <h5 class="b-abuelos">Bisabuelos (4ta. Generación)</h3>
                    </div>
                    <div class="col2">
                        <h5 class="b-abuelos">Bisabuelos (4ta. Generación)</h3>
                    </div>

                    <div class="b-abuelos-p">
                        <div class="col8">

                            @if (count($datos["family"]["Macho"][0]["Tercera generacion"])>0)
                            <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                                <h4 class="card-title b-abuelos">
                                    {{$datos["family"]["Macho"][0]["Tercera generacion"][0]->name}}
                                </h4>
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Tercera generacion"][0]->slug}}">
                                    @if (count($datos["family"]["Macho"][0]["Tercera generacion"][0]->medias)>0)


                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Tercera generacion"][0]->medias[0]->src)}}"
                                        class="card-img2" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                <div class="card-body">

                                </div>
                                @else
                                <h5 class="card-title text-center b-abuelos">No existen registros</h5>
                                <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                                <div class="card-body">
                                </div>
                                @endif


                            </div>
                        </div>


                        <div class="col8">

                            @if (count($datos["family"]["Macho"][0]["Tercera generacion"])>1)
                            <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                                <h4 class="card-title b-abuelos">
                                    {{$datos["family"]["Macho"][0]["Tercera generacion"][1]->name}}
                                </h4>
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Tercera generacion"][1]->slug}}">
                                    @if (count($datos["family"]["Macho"][0]["Tercera generacion"][1]->medias)>0)


                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Tercera generacion"][1]->medias[0]->src)}}"
                                        class="card-img2" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                <div class="card-body">

                                </div>
                                @else
                                <h5 class="card-title text-center b-abuelos">No existen registros</h5>
                                <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                                <div class="card-body">
                                </div>
                                @endif


                            </div>
                        </div>

                        <div class="col8">

                            @if (count($datos["family"]["Macho"][0]["Tercera generacion"])>2)
                            <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                                <h4 class="card-title b-abuelos">
                                    {{$datos["family"]["Macho"][0]["Tercera generacion"][2]->name}}
                                </h4>
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Tercera generacion"][2]->slug}}">
                                    @if (count($datos["family"]["Macho"][0]["Tercera generacion"][2]->medias)>0)


                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Tercera generacion"][2]->medias[0]->src)}}"
                                        class="card-img2" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                <div class="card-body">

                                </div>
                                @else
                                <h5 class="card-title text-center b-abuelos">No existen registros</h5>
                                <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                                <div class="card-body">
                                </div>
                                @endif


                            </div>
                        </div>


                        <div class="col8">

                            @if (count($datos["family"]["Macho"][0]["Tercera generacion"])>3)
                            <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                                <h4 class="card-title b-abuelos">
                                    {{$datos["family"]["Macho"][0]["Tercera generacion"][3]->name}}
                                </h4>
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Tercera generacion"][3]->slug}}">
                                    @if (count($datos["family"]["Macho"][0]["Tercera generacion"][3]->medias)>0)


                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Tercera generacion"][3]->medias[0]->src)}}"
                                        class="card-img2" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                <div class="card-body">

                                </div>
                                @else
                                <h5 class="card-title text-center b-abuelos">No existen registros</h5>
                                <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                                <div class="card-body">
                                </div>
                                @endif


                            </div>
                        </div>

                    </div>

                    <div class="b-abuelos-m">
                        <div class="col8">

                            @if (count($datos["family"]["Hembra"][0]["Tercera generacion"])>0)
                            <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                                <h4 class="card-title b-abuelos">
                                    {{$datos["family"]["Hembra"][0]["Tercera generacion"][0]->name}}
                                </h4>
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Tercera generacion"][0]->slug}}">
                                    @if (count($datos["family"]["Hembra"][0]["Tercera generacion"][0]->medias)>0)


                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Tercera generacion"][0]->medias[0]->src)}}"
                                        class="card-img2" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                <div class="card-body">

                                </div>
                                @else
                                <h5 class="card-title text-center b-abuelos">No existen registros</h5>
                                <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                                <div class="card-body">
                                </div>
                                @endif


                            </div>
                        </div>

                        <div class="col8">

                            @if (count($datos["family"]["Hembra"][0]["Tercera generacion"])>1)
                            <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                                <h4 class="card-title b-abuelos">
                                    {{$datos["family"]["Hembra"][0]["Tercera generacion"][1]->name}}
                                </h4>
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Tercera generacion"][1]->slug}}">
                                    @if (count($datos["family"]["Hembra"][0]["Tercera generacion"][1]->medias)>0)


                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Tercera generacion"][1]->medias[0]->src)}}"
                                        class="card-img2" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                <div class="card-body">

                                </div>
                                @else
                                <h5 class="card-title text-center b-abuelos">No existen registros</h5>
                                <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                                <div class="card-body">
                                </div>
                                @endif


                            </div>
                        </div>

                        <div class="col8">

                            @if (count($datos["family"]["Hembra"][0]["Tercera generacion"])>2)
                            <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                                <h4 class="card-title b-abuelos">
                                    {{$datos["family"]["Hembra"][0]["Tercera generacion"][2]->name}}
                                </h4>
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Tercera generacion"][2]->slug}}">
                                    @if (count($datos["family"]["Hembra"][0]["Tercera generacion"][2]->medias)>0)


                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Tercera generacion"][2]->medias[0]->src)}}"
                                        class="card-img2" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                <div class="card-body">

                                </div>
                                @else
                                <h5 class="card-title text-center b-abuelos">No existen registros</h5>
                                <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                                <div class="card-body">
                                </div>
                                @endif


                            </div>
                        </div>

                        <div class="col8">

                            @if (count($datos["family"]["Hembra"][0]["Tercera generacion"])>3)
                            <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                                <h4 class="card-title b-abuelos">
                                    {{$datos["family"]["Hembra"][0]["Tercera generacion"][3]->name}}
                                </h4>
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Tercera generacion"][3]->slug}}">
                                    @if (count($datos["family"]["Hembra"][0]["Tercera generacion"][3]->medias)>0)


                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Tercera generacion"][3]->medias[0]->src)}}"
                                        class="card-img2" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                <div class="card-body">

                                </div>
                                @else
                                <h5 class="card-title text-center b-abuelos">No existen registros</h5>
                                <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img2" alt="...">
                                <div class="card-body">
                                </div>
                                @endif


                            </div>
                        </div>


                    </div>

                </div>

                {{-- Tatarabuelos --}}
                <div class="row">
                    <div class="col2">
                        <h5 class="t-abuelos">Tatarabuelos (5ta. Generación)</h3>
                    </div>
                    <div class="col2">
                        <h5 class="t-abuelos">Tatarabuelos (5ta. Generación)</h3>
                    </div>
                    <div class="t-paternos" style="padding-bottom:80px;">
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Macho"][0]["Cuarta generacion"])>0)
                                <a href="">
                                    $datos["famil"]/Ejemplar/{{y["Macho"][0]["Cuarta generacion"][0]->medslug}}
                                    @if (count($datos["family"]["Macho"][0]["Cuarta generacion"][0]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Cuarta generacion"][0]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">

                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>


                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Macho"][0]["Cuarta generacion"])>1)
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Cuarta generacion"][1]->slug}}">

                                    @if (count($datos["family"]["Macho"][0]["Cuarta generacion"][1]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Cuarta generacion"][1]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">

                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Macho"][0]["Cuarta generacion"])>2)
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Cuarta generacion"][2]->slug}}">

                                    @if (count($datos["family"]["Macho"][0]["Cuarta generacion"][2]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Cuarta generacion"][2]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">

                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Macho"][0]["Cuarta generacion"])>3)
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Cuarta generacion"][3]->slug}}">

                                    @if (count($datos["family"]["Macho"][0]["Cuarta generacion"][3]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Cuarta generacion"][3]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>

                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Macho"][0]["Cuarta generacion"])>4)
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Cuarta generacion"][4]->slug}}">

                                    @if (count($datos["family"]["Macho"][0]["Cuarta generacion"][4]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Cuarta generacion"][4]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Macho"][0]["Cuarta generacion"])>5)
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Cuarta generacion"][5]->slug}}">

                                    @if (count($datos["family"]["Macho"][0]["Cuarta generacion"][5]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Cuarta generacion"][5]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Macho"][0]["Cuarta generacion"])>6)
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Cuarta generacion"][6]->slug}}">

                                    @if (count($datos["family"]["Macho"][0]["Cuarta generacion"][6]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Cuarta generacion"][6]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Macho"][0]["Cuarta generacion"])>7)
                                <a href="/Ejemplar/{{$datos["family"]["Macho"][0]["Cuarta generacion"][7]->slug}}">

                                    @if (count($datos["family"]["Macho"][0]["Cuarta generacion"][7]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Macho"][0]["Cuarta generacion"][7]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="t-maternos">
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"])>0)
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Cuarta generacion"][0]->slug}}">

                                    @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"][0]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Cuarta generacion"][0]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>


                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"])>1)
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Cuarta generacion"][1]->slug}}">

                                    @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"][1]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Cuarta generacion"][1]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"])>2)
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Cuarta generacion"][2]->slug}}">

                                    @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"][2]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Cuarta generacion"][2]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"])>3)
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Cuarta generacion"][3]->slug}}">

                                    @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"][3]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Cuarta generacion"][3]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>

                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"])>4)
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Cuarta generacion"][4]->slug}}">

                                    @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"][4]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Cuarta generacion"][4]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"])>5)
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Cuarta generacion"][5]->slug}}">

                                    @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"][5]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Cuarta generacion"][5]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"])>6)
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Cuarta generacion"][6]->slug}}">

                                    @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"][6]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Cuarta generacion"][6]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>
                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                        <div class="col16">
                            <div class="mini-card" style="width: 4rem; ">
                                @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"])>7)
                                <a href="/Ejemplar/{{$datos["family"]["Hembra"][0]["Cuarta generacion"][7]->slug}}">

                                    @if (count($datos["family"]["Hembra"][0]["Cuarta generacion"][7]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$datos["family"]["Hembra"][0]["Cuarta generacion"][7]->medias[0]->src)}}"
                                        class="card-img2" alt="...">

                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img2" alt="...">
                                    @endif
                                </a>

                                @else
                                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img2" alt="...">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>&copy; 2019 DERECHOS RESERVADOS. REALIZADO POR
                <a class="link" href="https://club.colorfussionkc.com/">COLOR FUSSION</a></small>
        </div>
    </footer>

    <script type="text/javascript" src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>

</body>

</html>