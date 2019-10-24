<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ejemplar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/css/all.min.css') }}">
    <link href="{{$page["urlFont"]}}" rel="stylesheet">
    @include('public.personal-ejemplar')
</head>
<style>

</style>

<body>
    <header>
        <input type="checkbox" id="btn-menu" />
        <label for="btn-menu"><i class="fa fa-bars" style="color: #B7B9C4"></i></label>
        <nav class="main-menu">
            <ul>
                <li> <a href="#" class="active"> Inicio</a></li>
                <li class="submenu"><a href="#">American Bully</i></a>
                </li>
                <li class="submenu"><a href="#">Bulldog Francés</a>
                </li>
                <li><a href="#">Bulldog Inglés</a></li>
                <li><a href="#">Web principal</a></li>
            </ul>
        </nav>
    </header>
    <div class="container-fluid bg-image">

        <div class="row bg-claro">
            <div class="column mt-2 details">
                <h5 class="text-center marco">
                    Información del ejemplar
                </h5>
                <div class="ml-5">
                    <p class="d-inline">Dato 1</p>
                    <p class="d-inline pos-l">{{$details['Detalles'][0]->color}} </p>
                </div>

                <div class="ml-5">
                    <p class="d-inline">Dato 2</p>
                    <p class="d-inline pos-l">{{$details['Detalles'][0]->genre}} </p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 3</p>
                    <p class="d-inline pos-l">{{$details['Detalles'][0]->type_register}} </p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 4</p>
                    <p class="d-inline pos-l">{{$details['Detalles'][0]->location}} </p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 5</p>
                    <p class="d-inline pos-l">{{$details['Detalles'][0]->birth_location}} </p>
                </div>
                <div class="ml-5 mb-4">
                    <p class="d-inline">Dato 6</p>
                    <p class="d-inline pos-l"></p>
                </div>
                <h5 class="text-center marco">Información criador</h5>
                <div class="ml-5 mt-3">
                    <p class="d-inline">Dato 1</p>
                    <p class="d-inline pos-l">{{$details["Dueños"]["Criador"]->name}} </p>
                </div>

                <div class="ml-5">
                    <p class="d-inline">Dato 2</p>
                    <p class="d-inline pos-l">{{$details["Dueños"]["Criador"]->last_name}} </p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 3</p>
                    <p class="d-inline pos-l">{{$details["Dueños"]["Criador"]->web_page}} </p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 4</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 5</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>
            </div>

            <div class="column text-center ">
                <h5 class="title-nombre">{{$details['Detalles'][0]->name}}</h5>

                <video id="video-portada" class="embed-responsive-item imagen" src="" allowfullscreen controls
                    style="display:none;"></video>

                @php

                if (count($details['Detalles'][0]->medias) > 0) {
                $ruta=$details['Detalles'][0]->medias[0]->src;
                }else{
                $ruta="silueta.png";

                }
                @endphp
                <img id="img-portada" src="{{URL::asset('/media/'.$ruta)}}" class="mx-auto d-block imagen"
                    style="border-radius: 25px;" />

                <div class="inline m-3">

                    @for ($i = 0; $i < count($details['Detalles'][0]->medias); $i++)
                        @php
                        $files = ['mp4', 'avi', 'mkv', 'flv', 'mov', 'wmv'];
                        $temp=explode('.',$details['Detalles'][0]->medias[$i]->src);
                        $largo=count($temp);
                        $extension=$temp[$largo-1];
                        @endphp
                        @if (in_array($extension, $files))
                        <span>
                            <img src="{{URL::asset('/media/thumbs/'.$details['Detalles'][0]->medias[$i]->src.'.jpg')}}"
                                class="rounded-circle mx-auto thumbnail" id=""
                                onclick="changeImg('{{$details['Detalles'][0]->medias[$i]->src}}')" />
                        </span>
                        @else
                        <span>
                            <img src="{{URL::asset('/media/thumbs/'.$details['Detalles'][0]->medias[$i]->src)}}"
                                class="rounded-circle mx-auto thumbnail" id=""
                                onclick="changeImg('{{$details['Detalles'][0]->medias[$i]->src}}')" />
                        </span>
                        @endif
                        @endfor

                </div>
            </div>

            <div class="column mt-2 details">
                <div class="marco  mb-2">
                    <h5 class="text-center">Genealogia</h5>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Padre registrado</p>
                    @if (count($abuelos[0]['Segunda generacion'])>0)
                    <p class="d-inline ml-5">{{$abuelos[0]['Segunda generacion'][0]->name}}</p>
                    @else
                    <p class="d-inline ml-5">No existen registros</p>
                    @endif

                </div>


                <div class="ml-5">
                    <p class="d-inline">Madre registrada</p>
                    @if (count($abuelos[0]['Segunda generacion'])>1)

                    <p class="d-inline ml-5">{{$abuelos[0]['Segunda generacion'][1]->name}}</p>
                    @else
                    <p class="d-inline ml-5">No existen registros</p>
                    @endif

                </div>

                <div class="container mt-5">
                    <div class="row ml-3 ">
                        <div class="col">
                            <label for="exampleFormControlSelect1">Hijos registrados</label>
                        </div>
                        <div class="col">
                            <select class="cbox" id="exampleFormControlSelect1">
                                <option selected="true" disabled="disabled">Todos los hijos</option>
                                @for ($i = 0; $i < count($details["Hijos"]); $i++) <option>
                                    {{$details["Hijos"][$i]->name}} </option>

                                    @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row ml-3">
                        <div class="col">
                            <label for="exampleFormControlSelect1">Hermanos registrados</label>
                        </div>
                        <div class="col">
                            <select class="cbox" id="exampleFormControlSelect1">
                                <option selected="true" disabled="disabled">Todos los hermanos</option>

                                @for ($i = 0; $i < count($details["Hermanos"]); $i++) <option>
                                    {{$details["Hermanos"][$i]->name}} </option>

                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="column">
                <h5 class="text-center titulos">Padres (2da. Generación)</h5>

                <div class="card m-padre mb-250">
                    <div class="card-body name-padre">
                        @if (count($abuelos[0]['Segunda generacion'])>1)

                        <h5 class="card-title text-center ">{{$abuelos[0]["Segunda generacion"][0]->name}}</h5>
                        <a href="/Ejemplar/{{$abuelos[0]["Segunda generacion"][0]->slug}}">


                            @if (count($abuelos[0]["Segunda generacion"][0]->medias)>0)

                            <img src="{{URL::asset('/media/'.$abuelos[0]["Segunda generacion"][0]->medias[0]->src)}}"
                                style="" class="card-img-top rounded" alt="...">

                            @else
                            <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img-top rounded"
                                alt="...">
                            @endif
                        </a>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][0]->type_register}} </p>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][0]->color}}</p>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][0]->location}}</p>

                        @else
                        <h5 class="card-title text-center">No existen registros</h5>
                        <img src="{{URL::asset('/media/no-existe.png')}}" style="" class="card-img-top rounded"
                            alt="...">

                        <p class="quit mb-5"></p>
                        @endif
                    </div>
                </div>


                <div class="card m-madre m-padre pb-90">
                    <div class="card-body name-padre">

                        @if (count($abuelos[0]['Segunda generacion'])>1)

                        <h5 class="card-title text-center ">{{$abuelos[0]["Segunda generacion"][1]->name}}</h5>
                        <a href="/Ejemplar/{{$abuelos[0]["Segunda generacion"][1]->slug}}">
                            @if (count($abuelos[0]["Segunda generacion"][1]->medias)>0)


                            <img src="{{URL::asset('/media/'.$abuelos[0]["Segunda generacion"][1]->medias[0]->src)}}"
                                class="card-img-top rounded" alt="...">
                            @else
                            <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img-top rounded"
                                alt="...">
                            @endif
                        </a>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][1]->type_register}}</p>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][1]->color}}</p>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][1]->location}}</p>
                        @else
                        <h5 class="card-title text-center">No existen registros</h5>

                        <img src="{{URL::asset('/media/no-existe.png')}}" style="" class="card-img-top rounded"
                            alt="...">
                        @endif

                    </div>
                </div>

            </div>

            <div class="column">
                <h5 class="text-center titulos">Abuelos (3ra. Generación)</h5>


                <div class="card mt-5 abuelos">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                @if (count($abuelos[0]['Tercera generacion'])>0)


                                <a href="/Ejemplar/{{$abuelos[0]["Tercera generacion"][0]->slug}}">

                                    @if (count($abuelos[0]['Tercera generacion'][0]->medias)>0)
                                    <img src="{{URL::asset('/media/'.$abuelos[0]["Tercera generacion"][0]->medias[0]->src)}}"
                                        class="card-img-top rounded abuelos-img" alt="...">
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}"
                                        class="card-img-top rounded abuelos-img" alt="...">

                                    @endif
                                </a>
                            </div>
                            <div class="col text-center">
                                <h5>{{$abuelos[0]["Tercera generacion"][0]->name}}</h5>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][0]->color}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][0]->type_register}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][0]->location}}</p>
                            </div>
                            @else

                            <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded abuelos-img"
                                alt="...">
                        </div>
                        <div class="col text-center">

                            <h5>No existen registros</h5>

                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mt-5 abuelos">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if (count($abuelos[0]['Tercera generacion'])>1)

                            <a href="/Ejemplar/{{$abuelos[0]["Tercera generacion"][1]->slug}}">

                                @if (count($abuelos[0]['Tercera generacion'][1]->medias)>0)
                                <img src="{{URL::asset('/media/'.$abuelos[0]["Tercera generacion"][1]->medias[0]->src)}}"
                                    class="card-img-top rounded abuelos-img" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded abuelos-img"
                                    alt="...">
                                @endif
                            </a>
                        </div>
                        <div class="col text-center">
                            <h5>{{$abuelos[0]["Tercera generacion"][1]->name}}</h5>
                            <p class="quit">{{$abuelos[0]["Tercera generacion"][1]->color}}</p>
                            <p class="quit">{{$abuelos[0]["Tercera generacion"][1]->type_register}}</p>
                            <p class="quit">{{$abuelos[0]["Tercera generacion"][1]->location}}</p>
                        </div>
                        @else
                        <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded abuelos-img"
                            alt="...">
                    </div>
                    <div class="col text-center">

                        <h5>No existen registros</h5>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="card m-maternas abuelos">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @if (count($abuelos[0]['Tercera generacion'])>2)

                        <a href="/Ejemplar/{{$abuelos[0]["Tercera generacion"][2]->slug}}">

                            @if (count($abuelos[0]['Tercera generacion'][2]->medias)>0)
                            <img src="{{URL::asset('/media/'.$abuelos[0]["Tercera generacion"][2]->medias[0]->src)}}"
                                class="card-img-top rounded abuelos-img" alt="...">
                            @else
                            <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded abuelos-img"
                                alt="...">
                            @endif
                        </a>
                    </div>
                    <div class="col text-center">
                        <h5>{{$abuelos[0]["Tercera generacion"][2]->name}}</h5>
                        <p class="quit">{{$abuelos[0]["Tercera generacion"][2]->color}}</p>
                        <p class="quit">{{$abuelos[0]["Tercera generacion"][2]->type_register}}</p>
                        <p class="quit">{{$abuelos[0]["Tercera generacion"][2]->location}}</p>
                    </div>
                    @else
                    <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded abuelos-img"
                        alt="...">
                </div>
                <div class="col text-center">

                    <h5>No existen registros</h5>
                </div>
                @endif

            </div>
        </div>
    </div>

    <div class="card mt-5 abuelos">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if (count($abuelos[0]['Tercera generacion'])>3)

                    <a href="/Ejemplar/{{$abuelos[0]["Tercera generacion"][3]->slug}}">

                        @if (count($abuelos[0]['Tercera generacion'][3]->medias)>0)
                        <img src="{{URL::asset('/media/'.$abuelos[0]["Tercera generacion"][3]->medias[0]->src)}}"
                            class="card-img-top rounded abuelos-img" alt="...">
                        @else
                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded abuelos-img"
                            alt="...">
                        @endif
                    </a>
                </div>
                <div class="col text-center">
                    <h5>{{$abuelos[0]["Tercera generacion"][0]->name}}</h5>
                    <p class="quit">{{$abuelos[0]["Tercera generacion"][3]->color}}</p>
                    <p class="quit">{{$abuelos[0]["Tercera generacion"][3]->type_register}}</p>
                    <p class="quit">{{$abuelos[0]["Tercera generacion"][3]->location}}</p>
                </div>
                @else
                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded abuelos-img" alt="...">
            </div>
            <div class="col text-center">

                <h5>No existen registros</h5>
            </div>
            @endif

        </div>
    </div>
    </div>

    </div>

    <div class="column">
        <h5 class="text-center titulos">Bisabuelos (4ta. Generación)</h5>

        <div class="card mt-2 bisa bisa-pat">
            <div class="card-body" style="padding:0px !important">
                <div class="row">
                    <div class="col">

                        @if (count($abuelos[0]['Cuarta generacion'])>0)
                        <a href="/Ejemplar/{{$abuelos[0]["Cuarta generacion"][0]->slug}}">
                            @if (count($abuelos[0]['Cuarta generacion'][0]->medias)>0)

                            <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][0]->medias[0]->src)}}"
                                class=" card-img-top rounded bisa-img" alt="...">

                            @else
                            <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                alt="...">
                            @endif
                        </a>
                    </div>
                    <div class="col text-center mt-2">

                        <p class="quit">{{$abuelos[0]["Cuarta generacion"][0]->name}}</p>
                        <p class="quit">{{$abuelos[0]["Cuarta generacion"][0]->color}}</p>
                        <p class="quit">{{$abuelos[0]["Cuarta generacion"][0]->location}}</p>
                        <p class="quit">{{$abuelos[0]["Cuarta generacion"][0]->type_register}}</p>

                    </div>
                    @else
                    <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded bisa-img" alt="">

                </div>
                <div class="col text-center mt-2">

                    <p class="quit">No existen registros</p>

                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="card mt-2 bisa">
        <div class="card-body" style="padding:0px !important">
            <div class="row">
                <div class="col">

                    @if (count($abuelos[0]['Cuarta generacion'])>1)
                    <a href="/Ejemplar/{{$abuelos[0]["Cuarta generacion"][1]->slug}}">
                        @if (count($abuelos[0]['Cuarta generacion'][1]->medias)>0)

                        <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][1]->medias[0]->src)}}"
                            class=" card-img-top rounded bisa-img" alt="...">

                        @else
                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img" alt="...">
                        @endif
                    </a>
                </div>
                <div class="col text-center mt-2">

                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][1]->name}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][1]->color}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][1]->location}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][1]->type_register}}</p>

                </div>
                @else
                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded bisa-img" alt="">

            </div>
            <div class="col text-center mt-2">

                <p class="quit">No existen registros</p>

            </div>
            @endif
        </div>
    </div>
    </div>

    <div class="card mt-2 bisa">
        <div class="card-body" style="padding:0px !important">
            <div class="row">
                <div class="col">

                    @if (count($abuelos[0]['Cuarta generacion'])>2)
                    <a href="/Ejemplar/{{$abuelos[0]["Cuarta generacion"][2]->slug}}">
                        @if (count($abuelos[0]['Cuarta generacion'][2]->medias)>0)

                        <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][2]->medias[0]->src)}}"
                            class=" card-img-top rounded bisa-img" alt="...">

                        @else
                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img" alt="...">
                        @endif
                    </a>
                </div>
                <div class="col text-center mt-2">

                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][2]->name}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][2]->color}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][2]->location}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][2]->type_register}}</p>

                </div>
                @else
                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded bisa-img" alt="">

            </div>
            <div class="col text-center mt-2">

                <p class="quit">No existen registros</p>

            </div>
            @endif
        </div>
    </div>
    </div>

    <div class="card mt-2 bisa">
        <div class="card-body" style="padding:0px !important">
            <div class="row">
                <div class="col">

                    @if (count($abuelos[0]['Cuarta generacion'])>3)
                    <a href="/Ejemplar/{{$abuelos[0]["Cuarta generacion"][3]->slug}}">
                        @if (count($abuelos[0]['Cuarta generacion'][3]->medias)>0)

                        <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][3]->medias[0]->src)}}"
                            class=" card-img-top rounded bisa-img" alt="...">

                        @else
                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img" alt="...">
                        @endif
                    </a>
                </div>
                <div class="col text-center mt-2">

                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][3]->name}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][3]->color}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][3]->location}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][3]->type_register}}</p>

                </div>
                @else
                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded bisa-img" alt="">

            </div>
            <div class="col text-center mt-2">

                <p class="quit">No existen registros</p>

            </div>
            @endif
        </div>
    </div>
    </div>

    <div class="card bisa bisa-mat">
        <div class="card-body" style="padding:0px !important">
            <div class="row">
                <div class="col">

                    @if (count($abuelos[0]['Cuarta generacion'])>4)
                    <a href="/Ejemplar/{{$abuelos[0]["Cuarta generacion"][4]->slug}}">
                        @if (count($abuelos[0]['Cuarta generacion'][4]->medias)>0)

                        <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][4]->medias[0]->src)}}"
                            class=" card-img-top rounded bisa-img" alt="...">

                        @else
                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img" alt="...">
                        @endif
                    </a>
                </div>
                <div class="col text-center mt-2">

                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][4]->name}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][4]->color}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][4]->location}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][4]->type_register}}</p>

                </div>
                @else
                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded bisa-img" alt="">

            </div>
            <div class="col text-center mt-2">

                <p class="quit">No existen registros</p>

            </div>
            @endif
        </div>
    </div>
    </div>

    <div class="card mt-2 bisa">
        <div class="card-body" style="padding:0px !important">
            <div class="row">
                <div class="col">

                    @if (count($abuelos[0]['Cuarta generacion'])>5)
                    <a href="/Ejemplar/{{$abuelos[0]["Cuarta generacion"][5]->slug}}">
                        @if (count($abuelos[0]['Cuarta generacion'][5]->medias)>0)

                        <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][5]->medias[0]->src)}}"
                            class=" card-img-top rounded bisa-img" alt="...">

                        @else
                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img" alt="...">
                        @endif
                    </a>
                </div>
                <div class="col text-center mt-2">

                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][5]->name}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][5]->color}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][5]->location}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][5]->type_register}}</p>

                </div>
                @else
                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded bisa-img" alt="">

            </div>
            <div class="col text-center mt-2">

                <p class="quit">No existen registros</p>

            </div>
            @endif
        </div>
    </div>
    </div>

    <div class="card mt-2 bisa">
        <div class="card-body" style="padding:0px !important">
            <div class="row">
                <div class="col">

                    @if (count($abuelos[0]['Cuarta generacion'])>6)
                    <a href="/Ejemplar/{{$abuelos[0]["Cuarta generacion"][6]->slug}}">
                        @if (count($abuelos[0]['Cuarta generacion'][6]->medias)>0)

                        <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][6]->medias[0]->src)}}"
                            class=" card-img-top rounded bisa-img" alt="...">

                        @else
                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img" alt="...">
                        @endif
                    </a>
                </div>
                <div class="col text-center mt-2">

                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][6]->name}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][6]->color}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][6]->location}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][6]->type_register}}</p>

                </div>
                @else
                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded bisa-img" alt="">

            </div>
            <div class="col text-center mt-2">

                <p class="quit">No existen registros</p>

            </div>
            @endif
        </div>
    </div>
    </div>

    <div class="card mt-2 bisa">
        <div class="card-body" style="padding:0px !important">
            <div class="row">
                <div class="col">

                    @if (count($abuelos[0]['Cuarta generacion'])>7)
                    <a href="/Ejemplar/{{$abuelos[0]["Cuarta generacion"][7]->slug}}">
                        @if (count($abuelos[0]['Cuarta generacion'][7]->medias)>0)

                        <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][7]->medias[0]->src)}}"
                            class=" card-img-top rounded bisa-img" alt="...">

                        @else
                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img" alt="...">
                        @endif
                    </a>
                </div>
                <div class="col text-center mt-2">

                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][7]->name}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][7]->color}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][7]->location}}</p>
                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][7]->type_register}}</p>

                </div>
                @else
                <img src="{{URL::asset('/media/no-existe.png')}}" class="card-img-top rounded bisa-img" alt="">

            </div>
            <div class="col text-center mt-2">

                <p class="quit">No existen registros</p>

            </div>
            @endif
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
    <script type="text/javascript" src="{{ URL::asset('js/public/images.js') }}"></script>
    <script src="{{ URL::asset('js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>

</body>

</html>