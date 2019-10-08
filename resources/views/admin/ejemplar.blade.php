@extends('layouts.dash')
@section('title', 'Ejemplar Atomos')

@section('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all"
    rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js"
    type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js"
    type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js"
    type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js 
3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script>
<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/LANG.js"></script>
@show


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Añadir Nuevo ejemplar</h4>
            </div>
            <div class="card-body">
                <form class="form-group" method="POST" action="/Example" enctype="multipart/form-data">
                    @csrf
                    <div class=" row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre del ejemplar</label>
                                <input type="text" class="form-control" placeholder="Company" name="name">
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
                                <input type="text" class="form-control" name="color" placeholder="Color">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tipo de registro</label>
                                <input type="text" class="form-control" placeholder="F1, F2, F3..." name="typeRegister">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Padre del ejemplar</label>
                                <input type="text" class="form-control" placeholder="Home Address" value="Atomos B">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Madre del Ejemplar</label>
                                <input type="text" class="form-control" placeholder="Home Address" value="Atomos B">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                                <label>Imagenes del ejemplar</label>
                            <input id="input-b3" name="src[]" type="file" class="file" multiple data-show-upload="false"
                                data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
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
                                <input type="text" class="form-control"  placeholder="Apellido" name="LastNameSeeder">
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

                    <button type="submit" class="btn btn-info btn-fill pull-right">Añadir ejemplar</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection