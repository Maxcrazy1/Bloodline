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



// Route::get('/', function () {
//     return view('public.home');
// });
Route::get('/buscador', function () {
    return view('public.search');
});
   

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/paginas', function () {
    return view('admin.pages');
});

Route::resource('field', 'fieldController');

Route::post('/field-update/{id}', 'fieldController@update');
// Route::post('/field-drop/{id}', 'fieldController@destroy');



/* Crud del ejemplar */
// Crud Resources de ejemplar
Route::resource('Ejemplar', 'EjemplarController');

// Route::get('Ejemplar/{id}/delete', 'EjemplarController@destroy');


/** Ejemplares */

// //Ejemplares por genero
Route::get('/Admin/Ejemplars', 'EjemplarController@getEjemplars');

// Listar ejemplares
Route::get('/orderColumn/{param}', 'pagesController@order');


/* Leer Media */
Route::get('/Media/{id}', 'Media@getMedia');


Route::get('/{name}', 'pagesController@page');


Route::get('/editar/{page}', 'pagesController@edit');

Route::get('/Ejemplares/{raza}', 'pagesController@ejemplares');

Route::get('/simulacion/{params}', 'pagesController@simulator');

Route::get('/h/getmediapage', 'pagesController@mediaPage');


Route::post('/updatepage', 'pagesController@update');


Route::post('/saveOrder', 'pagesController@update');
