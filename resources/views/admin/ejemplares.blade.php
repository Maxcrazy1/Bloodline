@extends('layouts.dash')
@section('title', 'Lista de ejemplares')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Todos los ejemplares registrados</h4>
                <div class="form-group">
                    <label>Insertar nombre del ejemplar</label>
                    <input type="text" class="form-control" placeholder="Atomos bully" value="">
                </div>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>Dueño</th>
                        <th>City</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dakota Rice</td>
                            <td>$36,738</td>
                            <td>Niger</td>
                            <td>Oud-Turnhout</td>
                            <td>Oud-Turnhout</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection