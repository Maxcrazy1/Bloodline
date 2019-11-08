@extends('layouts.dash')
@section('title', 'Ejemplar Atomos')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Añadir Nuevo ejemplar</h4>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'Ejemplar.store','method' => 'POST', 'files'=>true]) !!}
                @include('admin.subview.form-create')
                {!!Form::submit('Guardar Ejemplar',['class'=>'btn btn-info btn-fill pull-right'])!!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/admin/ejemplar.js') }}"></script>
@endsection