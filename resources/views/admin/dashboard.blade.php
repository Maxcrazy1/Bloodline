@extends('layouts.dash')
@section('title', 'Dashboard')

@section('content')

<div class="card p-4">
<div class="card-header">
    <h4 class="card-title">Ejemplares registrados</h4>
    <p class="card-category">Cantidad total de ejemplares</p>
</div>
<div class="content">
    <h1 class="text-center">{{$ejemplares}}</h1>
    <div class="card-footer">

        <hr>
        <div class="stats">
            <i class="fa fa-clock-o"></i> Actualizado recientemente
        </div>
    </div>
</div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Paginas registradas</h4>
            <p class="card-category">Cantidad total de paginas</p>
        </div>
        <div class="content">
            <h1 class="text-center">5</h1>
            <div class="card-footer">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i> Actualizado recientemente
                </div>
            </div>
        </div>
    </div>
</div>


@endsection