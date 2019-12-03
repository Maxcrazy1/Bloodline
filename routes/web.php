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



Route::get('/buscador', function () {
    return view('public.search');
});
   

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'EjemplarController@dashboard');
    Route::resource('field', 'fieldController');
    Route::get('deleteMedia/{image}', 'MediaController@destroy');
    Route::get('deleteMediaPage/{image}', 'MediaController@destroyMediaPage');
    Route::get('/page/lista', 'pagesController@listarPaginas');
    Route::get('/page/lista', function () {
        return view('admin.edicion-page.pages');
    });
    Route::post('/field-update/{id}', 'fieldController@update');
    Route::get('/editar/{page}', 'pagesController@edit');
    Route::post('/updatepage', 'pagesController@update');
    Route::post('/saveOrder', 'pagesController@saveOrden');
    Route::post('/savePasswrd', 'MediaController@editPass');
    Route::get('/settings', function () {
        return view('admin.settings');
    });
});


Route::get('/', 'pagesController@index');


// Crud Resources de ejemplar
Route::resource('Ejemplar', 'EjemplarController');

// Listar columnas de los ejemplares
Route::get('/orderColumn/{param}', 'pagesController@order');

/* Leer Media */
Route::resource('Media', 'MediaController');

Route::get('/{name}', 'pagesController@page');

Route::get('/Ejemplares/{raza}', 'pagesController@ejemplares');

Route::get('/simulacion/{params}', 'pagesController@simulator');
Route::get('/h/getmediapage', 'pagesController@mediaPage');




Auth::routes();



