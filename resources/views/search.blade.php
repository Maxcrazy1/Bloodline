@extends('layouts.app')
@section('title', 'Page Title')

@section('content')
<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::asset('js/js_public/search.js') }}"></script>

<header>
    <img class="imagen" src="https://source.unsplash.com/random" alt="" />
</header>
<div class=" container border text-center bg-light mt-5 up">
    <h1 class="mt-3">Buscador</h1>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Filtro 1</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Filtro 2</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Nombre del ejemplar</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                    placeholder="Inserte el nombre del perro" />
            </div>
        </div>
    </div>

    <section>
        <button type="button" class="m-3 btn btn-dark btn-lg">
            Buscar ejemplar
        </button>
    </section>
    <section>
        <button type="button" id="btn" class="mt-2 mb-4 btn btn-dark btn-lg">
            Simulador
        </button>
    </section>

    <table class="table table-fixed">
        <thead>
            <th scope="col" class="col-3">Nombre</th>
            <th scope="col" class="col-3">Kennel</th>
            <th scope="col" class="col-3">Padre</th>
            <th scope="col" class="col-3">Madre</th>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="col-3">Max</th>
                <td class="col-3">Mark</td>
                <td class="col-3">Otto</td>
                <td class="col-3">@mdo</td>
            </tr>
            <tr>
                <th scope="row" class="col-3">Max</th>
                <td class="col-3">Mark</td>
                <td class="col-3">Otto</td>
                <td class="col-3">@mdo</td>
            </tr>
            <tr>
                <th scope="row" class="col-3">Max</th>
                <td class="col-3">Mark</td>
                <td class="col-3">Otto</td>
                <td class="col-3">@mdo</td>
            </tr>
            <tr>
                <th scope="row" class="col-3">Max</th>
                <td class="col-3">Mark</td>
                <td class="col-3">Otto</td>
                <td class="col-3">@mdo</td>
            </tr>
            <tr>
                <th scope="row" class="col-3">Max</th>
                <td class="col-3">Mark</td>
                <td class="col-3">Otto</td>
                <td class="col-3">@mdo</td>
            </tr>
            <tr>
                <th scope="row" class="col-3">Max</th>
                <td class="col-3">Mark</td>
                <td class="col-3">Otto</td>
                <td class="col-3">@mdo</td>
            </tr>
            <tr>
                <th scope="row" class="col-3">Max</th>
                <td class="col-3">Mark</td>
                <td class="col-3">Otto</td>
                <td class="col-3">@mdo</td>
            </tr>
            <tr>
                <th scope="row" class="col-3">Max</th>
                <td class="col-3">Mark</td>
                <td class="col-3">Otto</td>
                <td class="col-3">@mdo</td>
            </tr>
        </tbody>
    </table>

    <div class="row" id="seccion">
        <div class="col">
            <button type="button" id="btn" class="mt-2 mb-4 btn btn-success btn-lg">
                Macho
            </button>
        </div>
        <div class="col">
            <button type="button" id="btn" data-toggle="modal" data-target="#exampleModal"
                class="mt-2 mb-4 btn btn-danger btn-lg">
                Hembra
            </button>
        </div>
    </div>
    <div class="row" id="seccion">
        <div class="col">
            <button type="button" id="btn" class="mt-2 mb-4 btn btn-success btn-lg">
                Obtener genealogia
            </button>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col">
                        <h2>Seleccione a la hembra</h2>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre del ejemplar</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Nombre del perrito">
                        </div>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-fixed">
                    <thead>
                        <th scope="col" class="col-3">Nombre</th>
                        <th scope="col" class="col-3">Kennel</th>
                        <th scope="col" class="col-3">Padre</th>
                        <th scope="col" class="col-3">Madre</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="col-3"><input class="" type="checkbox" id="inlineCheckbox1"
                                    value="option1"></th>
                            <th scope="row" class="col-3">Max</th>
                            <td class="col-3">Mark</td>
                            <td class="col-3">Otto</td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-3"><input class="" type="checkbox" id="inlineCheckbox1"
                                    value="option1"></th>
                            <th scope="row" class="col-3">Max</th>
                            <td class="col-3">Mark</td>
                            <td class="col-3">Otto</td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-3"><input class="" type="checkbox" id="inlineCheckbox1"
                                    value="option1"></th>
                            <th scope="row" class="col-3">Max</th>
                            <td class="col-3">Mark</td>
                            <td class="col-3">Otto</td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-3"><input class="" type="checkbox" id="inlineCheckbox1"
                                    value="option1"></th>
                            <th scope="row" class="col-3">Max</th>
                            <td class="col-3">Mark</td>
                            <td class="col-3">Otto</td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-3"><input class="" type="checkbox" id="inlineCheckbox1"
                                    value="option1"></th>
                            <th scope="row" class="col-3">Max</th>
                            <td class="col-3">Mark</td>
                            <td class="col-3">Otto</td>
                        </tr>
                        <tr>
                            <th scope="row" class="col-3"><input class="" type="checkbox" id="inlineCheckbox1"
                                    value="option1"></th>
                            <th scope="row" class="col-3">Max</th>
                            <td class="col-3">Mark</td>
                            <td class="col-3">Otto</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection