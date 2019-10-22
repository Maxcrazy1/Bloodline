@extends('layouts.dash')
@section('title', 'Lista de ejemplares')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card" id="tarjeta">
            <div class="card-header">
                <h4 class="card-title">Todos los ejemplares registrados</h4>
                <div class="row">
                    <div class="col">
                        <div class="form-group text-center">
                            <label for="exampleFormControlSelect1">Genero</label>
                            <select class="form-control" id="filter-1">
                                <option selected="true" disabled="disabled">Seleccione el genero</option>
                                <option>Macho</option>
                                <option>Hembra</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-center">
                            <label for="exampleFormControlSelect1">Color</label>
                            <input type="text" class="form-control" id="filter-2" aria-describedby="emailHelp"
                                placeholder="Color del ejemplar" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-center">
                            <label for="">Nombre del ejemplar</label>
                            <input type="text" class="form-control" id="filter-3" aria-describedby="emailHelp"
                                placeholder="Inserte el nombre del perro" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-center">
                            <label for="">Razas</label>
                            <select class="form-control" name="raza" id="filter-4">
                                    <option selected="true" disabled="disabled">Seleccione la raza</option>
                                
                                @for ($i = 0; $i < count($razas); $i++) 
                                <option>
                                    {{$razas[$i]->raza}} </option>
                                    @endfor
                            </select>

                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group text-center text-center">
                            <label for="">Click para buscar</label>

                            <button class="btn btn-primary" id="btn-search"><i class="fas fa-search"></i></button>

                        </div>
                    </div>
                </div>
            </div>
            @if ($notif!="")
            <div class="alert alert-danger" role="alert">
                    <strong>Ejemplar Eliminado</strong> La eliminación se ejecutó correctamente
                  </div>
            @endif
            

            @include('public.loading')
            <div id="lista-new">
            </div>

            <div id="lista-old">
                    @include('public.sublista')
            </div>
        </div>
    </div>
</div>

@endsection