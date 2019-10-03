@extends('layouts.dash')
@section('title', 'Ejemplar Atomos')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Añadir Nuevo ejemplar</h4>
            </div>
            <div class="card-body">
                <form>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre del ejemplar</label>
                                <input type="text" class="form-control" placeholder="Company"
                                    value="Mike">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Genero</label>
                                <input type="text" class="form-control" placeholder="Last Name"
                                    value="Andrew">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" placeholder="Home Address"
                                    value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Padre del ejemplar</label>
                                <input type="text" class="form-control" placeholder="Home Address"
                                    value="Atomos B">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Madre del Ejemplar</label>
                                <input type="text" class="form-control" placeholder="Home Address"
                                    value="Atomos B">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Imagenes del ejemplar</label>
                        </div>
                        <div class="col-md-12 text-center">

                            <img src="assets/img/faces/face-3.jpg"
                    alt="..." style="width: 60px; height: 60px;" />
                            <img src="assets/img/faces/face-3.jpg"
                    alt="..." style="width: 60px; height: 60px;" />
                </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Datos del dueño</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="City"
                                    value="Mike">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" class="form-control" placeholder="Country"
                                    value="Andrew">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pais de residencia</label>
                                <input type="number" class="form-control" placeholder="ZIP Code">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea rows="5" class="form-control"
                                    placeholder="Here can be your description"
                                    value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-right">Añadir ejemplar</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user" style="height: 23rem !important;">
            <div class="card-image">
                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                    alt="..." />
            </div>
            <div class="card-body">
                <div class="author" >
                        <img class="avatar border-gray" src="assets/img/faces/face-3.jpg"
                            alt="" />

                        <h4 class="title">Mike Andrew<br />
                            <small>michael24</small>
                        </h4>
                </div>
                </p>
            </div>
           
        </div>
    </div>

</div>
@endsection
