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

Route::get('itinerario', function () {
    return view('itinerario');
});

// MOCK CADASTROS

Route::get('cadastro-itinerario', function () {
    return view('cadastro.cadastro-itinerario');
});

Route::get('cadastro-anel', function () {
    return view('cadastro.cadastro-anel');
});

Route::get('cadastro-parada', function () {
    return view('cadastro.cadastro-parada');
});

Route::get('cadastro-linha', function () {
    return view('cadastro.cadastro-linha');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
