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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('carona/procurar', 'CaronaController@procurar')->name('carona.procurar');
    Route::get('carona/inscrever/{carona}', 'CaronaController@inscrever')->name('carona.inscrever');
    Route::get('carona/minhas', 'CaronaController@minhas')->name('carona.minhas');
    Route::get('carona/desinscrever/{carona}', 'CaronaController@desinscrever')->name('carona.desinscrever');

    Route::resource('carona', 'CaronaController');

    Route::resource('carro', 'CarroController');
});

Auth::routes();
