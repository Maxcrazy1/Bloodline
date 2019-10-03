@extends('layouts.dash')
@section('title', 'Pagina - Arbol genealogico')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Editar pagina</h4>
            </div>
            <div class="card-body">
                <form>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nombre de la pagina</label>
                                <input type="text" class="form-control" placeholder="Company"
                                    value="Árbol genealógico">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de fuente</label>
                                <input type="text" class="form-control" placeholder="Company"
                                    value="Mike">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tamaño de fuente</label>
                                <input type="text" class="form-control" placeholder="Last Name"
                                    value="16">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Color del fondo o textura</label>
                                <input type="text" class="form-control" placeholder="Código Hexadecimal"
                                    value="#FFFFFF">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Imagen de fondo</label>
                                <input type="text" class="form-control" placeholder="Home Address"
                                    value="Atomos B">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bordes</label>
                                <input type="text" class="form-control" placeholder="Home Address"
                                    value="Yes">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Color de Bordes</label>
                                <input type="text" class="form-control" placeholder="Home Address"
                                    value="Black">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Imagen de portada</label>
                        </div>
                        <div class="col-md-12 text-center">

                            <img src="assets/img/faces/face-3.jpg"
                    alt="..." style="width: 120px; height: 120px;" />
                </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Datos a mostrar en la tarjeta</h3>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Orden de items del card</h4>
                                    </div>
                                    <div class="card-body ">
                                        <div class="table-full-width">
                                            <table class="table">
                                                <thead>
                                                    <th>Orden</th>
                                                    <th>items</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="">
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                        </td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" checked>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="">
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Read "Following makes Medium better"</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="" disabled>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Unfollow 5 enemies from twitter</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>

                        <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar perfil</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
