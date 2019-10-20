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



Route::get('/', function () {
    return view('public.home');
});
Route::get('/buscador', function () {
    return view('public.search');
});
Route::get('/simulacion/{params}', 'EjemplarController@simulator');
   

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

// Crud Resources de ejemplar
Route::resource('Ejemplar', 'EjemplarController');


/** Ejemplares */

//Ejemplares por genero
Route::get('/Ejemplars/g/{genre}', 'EjemplarController@getGenre');

// Listar ejemplares
Route::get('/Ejemplares/{raza} ', 'EjemplarController@ejemplares');


/* Leer Media */
Route::get('/Media/{id}', 'EjemplarController@getMedia');

// Route::get('/', function () {

//     return view('welcome');

// });
