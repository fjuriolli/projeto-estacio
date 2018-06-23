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

Route::get('onibus-trajeto', 'OnibusTrajetoController@create');
Route::get('/resultado-trajeto', 'OnibusTrajetoController@store');
Route::get('/detalhes-trajetoa', 'OnibusTrajetoController@detalhesa');
Route::resource('trajeto', 'OnibusTrajetoController');

Route::get('/formulario-agora', 'OnibusAgoraController@mostrarFormularioAgora');
Route::get('/onibus-agora', 'OnibusAgoraController@andarOnibusAgora');
Route::get('/resultado-agora', 'OnibusAgoraController@mostrarViewResultadoAgora');
Route::get('/atualizar-onibus-agora', 'OnibusAgoraController@voltarParaConsultaAgora');

Route::get('/formulario-movimentar', 'MovimentarOnibusController@mostrarFormularioMovimentar');
Route::get('/movimentar-onibus', 'MovimentarOnibusController@movimentarOnibus');
Route::get('/resultado-movimentar', 'MovimentarOnibusController@mostrarViewResultadoMovimentar');
Route::get('/movimentar-onibus-agora', 'MovimentarOnibusController@voltarParaConsultaMovimentar');


Route::get('/formulario-itinerario', 'OnibusItinerarioController@mostrarFormulario');
Route::get('/onibus-itinerario', 'OnibusItinerarioController@andarOnibusItinerario');
Route::get('/resultado-itinerario', 'OnibusItinerarioController@store');
Route::resource('itinerario', 'OnibusItinerarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
