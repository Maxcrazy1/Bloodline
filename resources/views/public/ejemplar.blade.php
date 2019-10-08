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
                    <p class="d-inline pos-l">Texto 1</p>
                </div>

                <div class="ml-5">
                    <p class="d-inline">Dato 2</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 3</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 4</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 5</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>
                <div class="ml-5 mb-4">
                    <p class="d-inline">Dato 6</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>
                <h5 class="text-center marco">Información criador</h5>
                <div class="ml-5 mt-3">
                    <p class="d-inline">Dato 1</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>

                <div class="ml-5">
                    <p class="d-inline">Dato 2</p>
                    <p class="d-inline pos-l">Texto 1</p>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Dato 3</p>
                    <p class="d-inline pos-l">Texto 1</p>
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
                <h5>{{ejemplar->name}}</h5>
                <img src="https://source.unsplash.com/cljFTjl760Q/800x800" class="mx-auto d-block imagen"
                    style="border-radius: 25px;" />
                <div class="inline m-3">
                    <span>
                        <img src="https://source.unsplash.com/y3N24uWlEuo/50x50"
                            class="rounded-circle mx-auto" /></span>
                    <span>
                        <img src="https://source.unsplash.com/o1KOfZ_bEFA/50x50"
                            class="rounded-circle mx-auto" /></span>
                    <span>
                        <img src="https://source.unsplash.com/PZgHV8kd3-k/50x50"
                            class="rounded-circle mx-auto" /></span>
                </div>
            </div>

            <div class=" column mt-2">
                <div class="marco  mb-2">
                    <h5 class="text-center">Genealogia</h5>
                </div>
                <div class="ml-5">
                    <p class="d-inline">Padre registrado</p>
                    <p class="d-inline ml-5">XXXXXXXXXXX</p>
                </div>

                <div class="ml-5">
                    <p class="d-inline">Madre registrada</p>
                    <p class="d-inline ml-5">XXXXXXXXXXX</p>
                </div>

                <div class="container mt-5">
                    <div class="row ml-3">
                        <div class="col">
                            <label for="exampleFormControlSelect1">Hijos registrados</label>
                        </div>
                        <div class="col">
                            <select class="cbox" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="row ml-3">
                        <div class="col">
                            <label for="exampleFormControlSelect1">Hermanos registrados</label>
                        </div>
                        <div class="col">
                            <select class="cbox" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
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
                        <h5 class="card-title text-center">Padre</h5>
                        <img src="https://source.unsplash.com/cljFTjl760Q/390x310" style=""
                            class="card-img-top rounded" alt="...">

                        <p class="quit">Dato 1</p>
                        <p class="quit">Dato 1</p>
                        <p class="quit">Dato 1</p>
                    </div>
                </div>


                <div class="card m-madre m-padre" style="width: 22rem; margin:auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Madre</h5>
                        <img src="https://source.unsplash.com/cljFTjl760Q/390x310" class="card-img-top rounded"
                            alt="...">

                        <p class="quit">Dato 1</p>
                        <p class="quit">Dato 1</p>
                        <p class="quit">Dato 1</p>
                    </div>
                </div>
            </div>

            <div class="column ">
                <h5 class="text-center">Abuelos (3ra. Generación)</h5>

                <div class="card mt-5 abuelos abuelos-top"
                    style="width: 439 !important; height: 207px; margin:auto;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/261x207"
                                    class="card-img-top rounded abuelos-img" alt="...">
                            </div>
                            <div class="col text-center">
                                <h5>Abuelo Pat.</h5>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5 abuelos" style="width: 439; height: 207px; margin:auto;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/261x207"
                                    class="card-img-top rounded abuelos-img" alt="...">
                            </div>
                            <div class="col text-center">
                                <h5>Abuelo Pat.</h5>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card m-maternas abuelos" style="width: 439; height: 207px; margin:auto;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/261x207"
                                    class="card-img-top rounded abuelos-img" alt="...">
                            </div>
                            <div class="col text-center">
                                <h5>Abuelo Pat.</h5>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5 abuelos" style="width: 439; height: 207px; margin:auto;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/261x207"
                                    class="card-img-top rounded abuelos-img" alt="...">
                            </div>
                            <div class="col text-center">
                                <h5>Abuelo Pat.</h5>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="column">
                <h5 class="text-center">Bisabuelos (4ta. Generación)</h5>

                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/145x115"
                                    class="card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;"
                                    style="width:80%;">

                            </div>
                            <div class="col text-center mt-2">
                                <p class="quit">Abuelo Pat.</p>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/145x115"
                                    class="card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;">

                            </div>
                            <div class="col text-center mt-2">
                                <p class="quit">Abuelo Pat.</p>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/145x115"
                                    class="card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;">

                            </div>
                            <div class="col text-center mt-2">
                                <p class="quit">Abuelo Pat.</p>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/145x115"
                                    class="card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;">

                            </div>
                            <div class="col text-center mt-2">
                                <p class="quit">Abuelo Pat.</p>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bisa bisa-mat" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/145x115"
                                    class="card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;">

                            </div>
                            <div class="col text-center mt-2">
                                <p class="quit">Abuelo Pat.</p>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/145x115"
                                    class="card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;">

                            </div>
                            <div class="col text-center mt-2">
                                <p class="quit">Abuelo Pat.</p>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/145x115"
                                    class="card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;">

                            </div>
                            <div class="col text-center mt-2">
                                <p class="quit">Abuelo Pat.</p>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2 bisa" style="width: 322px; height: 121px; margin:auto;">
                    <div class="card-body" style="padding:0px !important">
                        <div class="row">
                            <div class="col">
                                <img src="https://source.unsplash.com/cljFTjl760Q/145x115"
                                    class="card-img-top rounded bisa-img" alt="..." style="width:80%; margin:9%;">

                            </div>
                            <div class="col text-center mt-2">
                                <p class="quit">Abuelo Pat.</p>
                                <p class="quit">dato 1</p>
                                <p class="quit">dato 2</p>
                                <p class="quit">dato 3</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection