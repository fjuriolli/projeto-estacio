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
    return view('principal');
});

Route::get('/cadastro-itinerario', 'ItinerarioController@create');
Route::post('/registro-sucesso', 'ItinerarioController@store');
Route::resource('itinerario', 'ItinerarioController');

Route::get('/cadastro-parada', 'ParadaController@create');
Route::post('/registro-sucesso', 'ParadaController@store');
Route::resource('parada', 'ParadaController');

Route::get('/cadastro-anel', 'AnelController@create');
Route::post('/registro-sucesso', 'AnelController@store');
Route::resource('anel', 'AnelController');

Route::get('/cadastro-linha', 'LinhaController@create');
Route::post('/registro-sucesso', 'LinhaController@store');
Route::resource('linha', 'LinhaController');

Route::get('/cadastro-logradouro', 'LogradouroController@create');
Route::post('/registro-sucesso', 'LogradouroController@store');
Route::resource('logradouro', 'LogradouroController');

Route::get('cadastro-onibus', 'OnibusController@create');
Route::post('/registro-sucesso', 'OnibusController@store');
Route::resource('onibus', 'OnibusController');


Route::get('onibus-agora', function() {
    return view('negocio.onibus-agora');
});

Route::get('onibus-itinerario', function() {
    return view('negocio.onibus-itinerario');
});

Route::get('onibus-trajeto', function() {
    return view('negocio.onibus-trajeto');
});

Route::get('/teste-seeders-view', 'TesteController@get');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
