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
    return view('home');
});
Route::get('/buscador', function () {
    return view('search');
});
Route::get('/cruza', function () {
    return view('arbol');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/ejemplares', function () {
    return view('admin.ejemplares');
});
Route::get('/paginas', function () {
    return view('admin.pages');
});
Route::get('/ejemplar/{name}', function () {
    return view('admin.ejemplar');
});
Route::get('/pagina/{name}', function () {
    return view('admin.editar-pagina');
});


// Route::get('prueba/{name}','pruebaController@prueba');

// Route::get('/', function () {

//     return view('welcome');

// });
