@extends('layouts.app')
@section('title', 'Ejemplar')

@push('styles')
<link href="{{ asset('css/ejemplar.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="top">
    <div class="container-fluid">

        <div class="row bg-claro">
            <div class=" column mt-2">
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
                <h5>{{$details['Detalles'][0]->name}}</h5>

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

            <div class=" column mt-2">
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
                    <div class="row ml-3">
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

        <div class="row mt-5 mb-5">
            <div class="column">
                <h5 class="text-center">Padres (2da. Generación)</h5>

                <div class="card m-padre" style="width: 22rem; margin:auto;">
                    <div class="card-body">
                        @if (count($abuelos[0]['Segunda generacion'])>1)

                        <h5 class="card-title text-center">{{$abuelos[0]["Segunda generacion"][0]->name}}</h5>
                        <img src="{{URL::asset('/media/'.$abuelos[0]["Segunda generacion"][0]->medias[0]->src)}}"
                            style="" class="card-img-top rounded" alt="...">

                        <p class="quit">{{$abuelos[0]["Segunda generacion"][0]->type_register}} </p>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][0]->color}}</p>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][0]->location}}</p>

                        @else
                        <h5 class="card-title text-center">No existen registros</h5>
                        <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img-top rounded" alt="...">

                        <p class="quit"> </p>
                        <p class="quit"></p>
                        <p class="quit"></p>
                        @endif
                    </div>
                </div>


                <div class="card m-madre m-padre" style="width: 22rem; margin:auto;">
                    <div class="card-body">

                        @if (count($abuelos[0]['Segunda generacion'])>1)

                        <h5 class="card-title text-center">{{$abuelos[0]["Segunda generacion"][1]->name}}</h5>
                        <img src="{{URL::asset('/media/'.$abuelos[0]["Segunda generacion"][0]->medias[0]->src)}}"
                            class="card-img-top rounded" alt="...">

                        <p class="quit">{{$abuelos[0]["Segunda generacion"][1]->type_register}}</p>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][1]->color}}</p>
                        <p class="quit">{{$abuelos[0]["Segunda generacion"][1]->location}}</p>
                    </div>
                    @else
                    <h5 class="card-title text-center">No existen registros</h5>
                    <img src="{{URL::asset('/media/silueta.png')}}" style="" class="card-img-top rounded" alt="...">

                    <p class="quit"> </p>
                    <p class="quit"></p>
                    <p class="quit mb-5"></p>
                    @endif

                </div>
            </div>

            <div class="column ">
                <h5 class="text-center">Abuelos (3ra. Generación)</h5>

                <div class="card mt-5 abuelos abuelos-top" style="width: 439 !important; height: 207px; margin:auto;">
                    <div class="card-body">
                        <div class="row">
                            @if (count($abuelos[0]['Tercera generacion'])>0)

                            <div class="col">
                                @if (count($abuelos[0]['Tercera generacion'][0]->medias)>1)

                                <img src="{{URL::asset('/media/'.$abuelos[0]["Tercera generacion"][0]->medias[0]->src)}}"
                                    class="card-img-top rounded abuelos-img" alt="...">
                                @else
                                <img src="{{URL::asset('/media/thumbs/silueta.png')}}"
                                    class="card-img-top rounded abuelos-img" alt="...">
                                @endif
                            </div>
                            <div class="col text-center">
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][0]->color}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][0]->type_register}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][0]->location}}</p>
                            </div>
                            @else

                            @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-5 abuelos" style="width: 439; height: 207px; margin:auto;">
                    <div class="card-body">
                        <div class="row">
                            @if (count($abuelos[0]['Tercera generacion'])>1)

                            <div class="col">
                                @if (count($abuelos[0]['Tercera generacion'][1]->medias)>1)

                                <img src="{{URL::asset('/media/'.$abuelos[0]["Tercera generacion"][1]->medias[0]->src)}}"
                                    class="card-img-top rounded abuelos-img" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded abuelos-img"
                                    alt="...">
                                @endif
                            </div>
                            <div class="col text-center">
                                <h5>{{$abuelos[0]["Tercera generacion"][1]->name}}</h5>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][1]->color}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][1]->type_register}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][1]->location}}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card m-maternas abuelos" style="width: 439; height: 207px; margin:auto;">
                    <div class="card-body">
                        <div class="row">
                            @if (count($abuelos[0]['Tercera generacion'])>2)

                            <div class="col">
                                @if (count($abuelos[0]['Tercera generacion'][2]->medias)>2)

                                <img src="{{URL::asset('/media/'.$abuelos[0]["Tercera generacion"][2]->medias[0]->src)}}"
                                    class="card-img-top rounded abuelos-img" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded abuelos-img"
                                    alt="...">
                                @endif
                            </div>
                            <div class="col text-center">
                                <h5>{{$abuelos[0]["Tercera generacion"][2]->name}}</h5>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][2]->color}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][2]->type_register}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][2]->location}}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-5 abuelos" style="width: 439; height: 207px; margin:auto;">
                    <div class="card-body">
                        <div class="row">
                            @if (count($abuelos[0]['Tercera generacion'])>3)

                            <div class="col">
                                @if (count($abuelos[0]['Tercera generacion'][3]->medias)>3)

                                <img src="{{URL::asset('/media/'.$abuelos[0]["Tercera generacion"][3]->medias[0]->src)}}"
                                    class="card-img-top rounded abuelos-img" alt="...">
                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded abuelos-img"
                                    alt="...">
                                @endif
                            </div>
                            <div class="col text-center">
                                <h5>{{$abuelos[0]["Tercera generacion"][3]->name}}</h5>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][3]->color}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][3]->type_register}}</p>
                                <p class="quit">{{$abuelos[0]["Tercera generacion"][3]->location}}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <div class="column">
                <h5 class="text-center">Bisabuelos (4ta. Generación)</h5>

                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            @if (count($abuelos[0]['Cuarta generacion'])>0)

                            <div class="col">
                                @if (count($abuelos[0]['Cuarta generacion'][0]->medias)>0)

                                <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][0]->medias[0]->src)}}
                                    class=" card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                    style="width:80%;">

                                @else
                                <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                    alt="..." style="width:80%; margin:9%;" style="width:80%;">
                                @endif

                            </div>
                            <div class="col text-center mt-2">

                                <p class="quit">{{$abuelos[0]["Cuarta generacion"][0]->name}}</p>
                                <p class="quit">{{$abuelos[0]["Cuarta generacion"][0]->color}}</p>
                                <p class="quit">{{$abuelos[0]["Cuarta generacion"][0]->location}}</p>
                                <p class="quit">{{$abuelos[0]["Cuarta generacion"][0]->type_register}}</p>

                            </div>
                            @else
                            <div class="col">
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                        alt="..." style="width:80%; margin:9%;" style="width:80%;">
    
                                </div>
                                <div class="col text-center mt-2">
    
                                    <p class="quit">No existen registros</p>
    
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                                @if (count($abuelos[0]['Cuarta generacion'])>1)

                                <div class="col">
                                    @if (count($abuelos[0]['Cuarta generacion'][1]->medias)>0)
    
                                    <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][1]->medias[0]->src)}}
                                        class=" card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                        style="width:80%;">
    
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                        alt="..." style="width:80%; margin:9%;" style="width:80%;">
                                    @endif
    
                                </div>
                                <div class="col text-center mt-2">
    
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][1]->name}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][1]->color}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][1]->location}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][1]->type_register}}</p>
    
                                </div>
                                @else
                                <div class="col">
                                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                            alt="..." style="width:80%; margin:9%;" style="width:80%;">
        
                                    </div>
                                    <div class="col text-center mt-2">
        
                                        <p class="quit">No existen registros</p>
        
                                    </div>
                                @endif
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                                @if (count($abuelos[0]['Cuarta generacion'])>2)

                                <div class="col">
                                    @if (count($abuelos[0]['Cuarta generacion'][2]->medias)>0)
    
                                    <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][2]->medias[0]->src)}}
                                        class=" card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                        style="width:80%;">
    
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                        alt="..." style="width:80%; margin:9%;" style="width:80%;">
                                    @endif
    
                                </div>
                                <div class="col text-center mt-2">
    
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][2]->name}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][2]->color}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][2]->location}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][2]->type_register}}</p>
    
                                </div>
                                @else
                                <div class="col">
                                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                            alt="..." style="width:80%; margin:9%;" style="width:80%;">
        
                                    </div>
                                    <div class="col text-center mt-2">
        
                                        <p class="quit">No existen registros</p>
        
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                                @if (count($abuelos[0]['Cuarta generacion'])>3)

                                <div class="col">
                                    @if (count($abuelos[0]['Cuarta generacion'][3]->medias)>0)
    
                                    <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][3]->medias[0]->src)}}
                                        class=" card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                        style="width:80%;">
    
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                        alt="..." style="width:80%; margin:9%;" style="width:80%;">
                                    @endif
    
                                </div>
                                <div class="col text-center mt-2">
    
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][3]->name}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][3]->color}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][3]->location}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][3]->type_register}}</p>
    
                                </div>
                                @else
                                <div class="col">
                                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                            alt="..." style="width:80%; margin:9%;" style="width:80%;">
        
                                    </div>
                                    <div class="col text-center mt-2">
        
                                        <p class="quit">No existen registros</p>
        
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>

                <div class="card bisa bisa-mat" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                                @if (count($abuelos[0]['Cuarta generacion'])>4)

                                <div class="col">
                                    @if (count($abuelos[0]['Cuarta generacion'][4]->medias)>0)
    
                                    <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][4]->medias[0]->src)}}
                                        class=" card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                        style="width:80%;">
    
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                        alt="..." style="width:80%; margin:9%;" style="width:80%;">
                                    @endif
    
                                </div>
                                <div class="col text-center mt-2">
    
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][4]->name}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][4]->color}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][4]->location}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][4]->type_register}}</p>
    
                                </div>
                                @else
                                <div class="col">
                                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                            alt="..." style="width:80%; margin:9%;" style="width:80%;">
        
                                    </div>
                                    <div class="col text-center mt-2">
        
                                        <p class="quit">No existen registros</p>
        
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                                @if (count($abuelos[0]['Cuarta generacion'])>5)

                                <div class="col">
                                    @if (count($abuelos[0]['Cuarta generacion'][5]->medias)>0)
    
                                    <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][5]->medias[0]->src)}}
                                        class=" card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                        style="width:80%;">
    
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                        alt="..." style="width:80%; margin:9%;" style="width:80%;">
                                    @endif
    
                                </div>
                                <div class="col text-center mt-2">
    
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][5]->name}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][5]->color}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][5]->location}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][5]->type_register}}</p>
    
                                </div>
                                @else
                                <div class="col">
                                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                            alt="..." style="width:80%; margin:9%;" style="width:80%;">
        
                                    </div>
                                    <div class="col text-center mt-2">
        
                                        <p class="quit">No existen registros</p>
        
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                                @if (count($abuelos[0]['Cuarta generacion'])>6)

                                <div class="col">
                                    @if (count($abuelos[0]['Cuarta generacion'][6]->medias)>0)
    
                                    <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][6]->medias[0]->src)}}
                                        class=" card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                        style="width:80%;">
    
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                        alt="..." style="width:80%; margin:9%;" style="width:80%;">
                                    @endif
    
                                </div>
                                <div class="col text-center mt-2">
    
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][6]->name}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][6]->color}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][6]->location}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][6]->type_register}}</p>
    
                                </div>
                                @else
                                <div class="col">
                                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                            alt="..." style="width:80%; margin:9%;" style="width:80%;">
        
                                    </div>
                                    <div class="col text-center mt-2">
        
                                        <p class="quit">No existen registros</p>
        
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                                @if (count($abuelos[0]['Cuarta generacion'])>7)

                                <div class="col">
                                    @if (count($abuelos[0]['Cuarta generacion'][7]->medias)>0)
    
                                    <img src="{{URL::asset('/media/thumbs/'.$abuelos[0]["Cuarta generacion"][7]->medias[0]->src)}}
                                        class=" card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                        style="width:80%;">
    
                                    @else
                                    <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                        alt="..." style="width:80%; margin:9%;" style="width:80%;">
                                    @endif
    
                                </div>
                                <div class="col text-center mt-2">
    
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][7]->name}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][7]->color}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][7]->location}}</p>
                                    <p class="quit">{{$abuelos[0]["Cuarta generacion"][7]->type_register}}</p>
    
                                </div>
                                @else
                                <div class="col">
                                        <img src="{{URL::asset('/media/silueta.png')}}" class="card-img-top rounded bisa-img"
                                            alt="..." style="width:80%; margin:9%;" style="width:80%;">
        
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
</div>

<script type="text/javascript" src="{{ URL::asset('js/public/images.js') }}"></script>
@endsection