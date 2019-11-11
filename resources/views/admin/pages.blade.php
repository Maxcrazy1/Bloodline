@extends('layouts.dash')
@section('title', 'Todas las páginas')

@section('content')
<div class="card-header">
    <h4 class="card-title">Todas las páginas creadas</h4>
</div>

<!-- container -->
<div class="container">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Páginas</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="iconosPage">
            <tr>
                <td><i class="fas fa-home"></i></td>
                <td>Inicio de BloodLine </td>
                <th>
                    <a href="/editar/home" class="fas fa-edit ml-3 c-blue" aria-hidden="true">
                    </a>
                </th>
            </tr>
            <tr>
                <td><i class="fas fa-paw"></i></td>
                <td>Datos del ejemplar </td>
                <th>
                    <a href="/editar/show" class="fas fa-edit ml-3 c-blue" aria-hidden="true">
                    </a>
                </th>
            </tr>
            <tr>
                <td>
                    <i class="fas fa-tree"></i>
                </td>
                <td>Simulador de ejemplar </td>
                <th>
                    <a href="/editar/simulador" class="fas fa-edit ml-3 c-blue" aria-hidden="true">
                    </a>
                </th>
            </tr>
            <tr>
                <td><i class="fas fa-search"></i></td>
                <td>Buscador de ejemplar </td>
                <th>
                    <a href="/editar/listado" class="fas fa-edit ml-3 c-blue" aria-hidden="true">
                    </a>
                </th>
            </tr>
        </tbody>
    </table>
</div>
@endsection