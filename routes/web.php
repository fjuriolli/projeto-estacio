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

Route::get('/itinerarios', 'ItinerarioController@lista');
Route::get('/itinerarios/mostra/{id}', 'ItinerarioController@mostra')->where('id', '[0-9]+');
Route::get('/itinerarios/remove/{id}', 'ItinerarioController@remove')->where('id', '[0-9]+');
Route::post('/itinerarios/adiciona', 'ItinerarioController@adiciona');
Route::get('/itinerarios/novo', 'ItinerarioController@novo');

Route::get('/paradas', 'ParadaController@lista');
Route::get('/paradas/mostra/{id}', 'ParadaController@mostra')->where('id', '[0-9]+');
Route::get('/paradas/remove/{id}', 'ParadaController@remove')->where('id', '[0-9]+');
Route::post('/paradas/adiciona', 'ParadaController@adiciona');
Route::get('/paradas/novo', 'ParadaController@novo');


Route::get('/aneis', 'AnelController@lista');
Route::get('/aneis/mostra/{id}', 'AnelController@mostra')->where('id', '[0-9]+');
Route::get('/aneis/remove/{id}', 'AnelController@remove')->where('id', '[0-9]+');
Route::post('/aneis/adiciona', 'AnelController@adiciona');
Route::get('/aneis/novo', 'AnelController@novo');

Route::get('/linhas', 'LinhaController@lista');
Route::get('/linhas/mostra/{id}', 'LinhaController@mostra')->where('id', '[0-9]+');
Route::get('/linhas/remove/{id}', 'LinhaController@remove')->where('id', '[0-9]+');
Route::post('/linhas/adiciona', 'LinhaController@adiciona');
Route::get('/linhas/novo', 'LinhaController@novo');

Route::get('/cadastro-linha', 'LinhaController@create');
Route::post('/registro-sucesso', 'LinhaController@store');
Route::resource('linha', 'LinhaController');

Route::get('/logradouros', 'LogradouroController@lista');
Route::get('/logradouros/mostra/{id}', 'LogradouroController@mostra')->where('id', '[0-9]+');
Route::get('/logradouros/remove/{id}', 'LogradouroController@remove')->where('id', '[0-9]+');
Route::post('/logradouros/adiciona', 'LogradouroController@adiciona');
Route::get('/logradouros/novo', 'LogradouroController@novo');

Route::get('/onibus', 'OnibusController@lista');
Route::get('/onibus/mostra/{id}', 'OnibusController@mostra')->where('id', '[0-9]+');
Route::get('/onibus/remove/{id}', 'OnibusController@remove')->where('id', '[0-9]+');
Route::post('/onibus/adiciona', 'OnibusController@adiciona');
Route::get('/onibus/novo', 'OnibusController@novo');

Route::get('onibus-trajeto', 'OnibusTrajetoController@create');
Route::get('/resultado-trajeto', 'OnibusTrajetoController@store');
Route::get('/detalhes-trajetoa', 'OnibusTrajetoController@detalhesa');
Route::resource('trajeto', 'OnibusTrajetoController');

Route::get('/formulario-agora', 'OnibusAgoraController@mostrarFormularioAgora');
Route::get('/onibus-agora', 'OnibusAgoraController@localizarOnibusAgora');
Route::get('/resultado-agora', 'OnibusAgoraController@mostrarViewResultadoAgora');
Route::get('/atualizar-onibus-agora', 'OnibusAgoraController@voltarParaConsultaAgora');

Route::get('/formulario-movimentar', 'MovimentarOnibusController@mostrarFormularioMovimentar');
Route::get('/movimentar-onibus', 'MovimentarOnibusController@movimentarOnibus');
Route::get('/resultado-movimentar', 'MovimentarOnibusController@mostrarViewResultadoMovimentar');
Route::get('/movimentar-onibus-agora', 'MovimentarOnibusController@voltarParaConsultaMovimentar');


Route::get('/formulario-itinerario', 'OnibusItinerarioController@mostrarFormularioItinerario');
Route::get('/onibus-itinerario', 'OnibusItinerarioController@localizarOnibusItinerario');
Route::get('/resultado-itinerario', 'OnibusItinerarioController@mostrarViewResultadoItinerario');
Route::get('/atualizar-itinerario-agora', 'OnibusItinerarioController@voltarParaConsultaItinerario');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
