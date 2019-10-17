<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/ejemplars/{genre}', 'EjemplarController@index');

Route::get('/', function () {
    return view('public.home');
});
Route::get('/buscador', function () {
    return view('public.search');
});
Route::get('/cruza', function () {
    return view('public.arbol');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/paginas', function () {
    return view('admin.pages');
});

Route::get('/pagina/{name}', function () {
    return view('admin.editar-pagina');
});

/* Crud del ejemplar */

//Vista añadir ejemplar
Route::get('/agregar-ejemplar', function () {
    $url = "/example";
    $textBtn = "Añadir Ejemplar";
    return view('admin.ejemplar', compact('url', 'textBtn', 'datos'));
});


// Crud Resources de ejemplar
Route::resource('Ejemplar', 'EjemplarController');


/** Ejemplares */

// Listar ejemplares
Route::get('/ejemplares', function () {
    return view('admin.ejemplares');
});

/* Leer Media */
Route::get('/Media/{id}', 'EjemplarController@getMedia');

// Route::get('/', function () {

//     return view('welcome');

// });
