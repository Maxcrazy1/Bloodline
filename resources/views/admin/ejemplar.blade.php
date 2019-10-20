@extends('layouts.dash')
@section('title', 'Ejemplar Atomos')
@include('admin.scripts-drag')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Añadir Nuevo ejemplar</h4>
            </div>
            <div class="card-body">
                <form class="form-group" method="POST" action="/Ejemplar" enctype="multipart/form-data">
                    @csrf
                    <div class=" row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre del ejemplar</label>
                                <input type="text" class="form-control" placeholder="Atomos Bully" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Genero</label>
                                <select name="sex" class="form-control" id="exampleFormControlSelect1">
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color del ejemplar</label>
                                <input type="text" class="form-control" name="Brown" placeholder="Color">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de registro</label>
                                <input type="text" class="form-control" placeholder="F1, F2, F3..." name="typeRegister">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Raza del ejemplar</label>
                                <select class="form-control" name="raza" id="exampleFormControlSelect1">
                                        @for ($i = 0; $i < count($razas); $i++) <option>
                                            {{$razas[$i]->raza}} </option>
                                            @endfor
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lugar de nacimiento</label>
                                <textarea rows="5" class="form-control" placeholder="Dirección de nacimiento" value=""
                                    name="location"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Residencia actual</label>
                                <textarea rows="5" class="form-control" placeholder="Dirección de residencia actual"
                                    value="" name="birthLocation"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container border mb-4">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>Padres del ejemplar</h2>
                            </div>
                        </div>
                        @include('public.seleccion')
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Imagenes del ejemplar</label>
                            <input id="input-b3" name="src[]" type="file" class="file" multiple data-show-upload="false"
                                data-show-caption="true" data-msg-placeholder="Select {files} for upload..." data-theme="fas">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Datos del propietario</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="firstName">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellido" name="lastName">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Datos del criador</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="firstNameSeeder">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellido" name="LastNameSeeder">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>pagina web del criador</label>
                                <input type="text" class="form-control" placeholder="www.criador.com" name="webpage">
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info btn-fill pull-right" value="Añadir Ejemplar">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/admin/ejemplar.js') }}"></script>
@endsection
@include('public.modal')
