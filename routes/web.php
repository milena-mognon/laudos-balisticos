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

/* public routes*/
Route::get('/', 'HomeController@index')->name('home');

/* Auth routes */
Auth::routes();

/* Admin routes */
Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

Route::resource('solicitantes', 'Admin\OrgaosSolicitantesController');
Route::resource('users', 'Admin\UsersController');
Route::resource('marcas', 'Admin\MarcasController');
Route::resource('calibres', 'Admin\CalibresController');

Route::get('laudos/solicitantes/cidade/{cidade_id}', 'Admin\OrgaosSolicitantesController@filtrar_por_cidade')->name('solicitantes.filtrar');

Route::get('origens', 'Admin\OrigensController@index')->name('origens.index');
Route::get('origens/create', 'Admin\OrigensController@create')->name('origens.create');
Route::post('origens', 'Admin\OrigensController@store')->name('origens.store');
Route::get('origens/{origem}', 'Admin\OrigensController@show')->name('origens.show');
Route::get('origens/{origem}/edit', 'Admin\OrigensController@edit')->name('origens.edit');
Route::patch('origens/{origem}', 'Admin\OrigensController@update')->name('origens.update');
Route::delete('origens/{id}', 'Admin\OrigensController@destroy')->name('origens.destroy');

Route::get('secoes', 'Admin\SecoesController@index')->name('secoes.index');
Route::get('secoes/create', 'Admin\SecoesController@create')->name('secoes.create');
Route::post('secoes', 'Admin\SecoesController@store')->name('secoes.store');
Route::get('secoes/{secao}', 'Admin\SecoesController@show')->name('secoes.show');
Route::get('secoes/{secao}/edit', 'Admin\SecoesController@edit')->name('secoes.edit');
Route::patch('secoes/{secao}', 'Admin\SecoesController@update')->name('secoes.update');
Route::delete('secoes/{id}', 'Admin\SecoesController@destroy')->name('secoes.destroy');

Route::get('diretores', 'Admin\DiretoresController@index')->name('diretores.index');
Route::get('diretores/create', 'Admin\DiretoresController@create')->name('diretores.create');
Route::post('diretores', 'Admin\DiretoresController@store')->name('diretores.store');
Route::get('diretores/{diretor}', 'Admin\DiretoresController@show')->name('diretores.show');
Route::get('diretores/{diretor}/edit', 'Admin\DiretoresController@edit')->name('diretores.edit');
Route::patch('diretores/{diretor}', 'Admin\DiretoresController@update')->name('diretores.update');
Route::delete('diretores/{diretor}', 'Admin\DiretoresController@destroy')->name('diretores.destroy');


/* Peritos routes */
Route::resource('laudos', 'Perito\LaudosController');

Route::get('laudos/armas', 'Perito\ArmasController@index')->name('armas.index');
Route::get('laudos/{laudo}/armas/create', 'Perito\ArmasController@create')->name('armas.create');
Route::post('laudos/armas', 'Perito\ArmasController@store')->name('armas.store');
Route::get('laudos/armas/{arma}', 'Perito\ArmasController@show')->name('armas.show');
Route::get('laudos/armas/{arma}/edit', 'Perito\ArmasController@edit')->name('armas.edit');
Route::patch('laudos/armas/{arma}', 'Perito\ArmasController@update')->name('armas.update');
Route::delete('laudos/armas/{arma}', 'Perito\ArmasController@destroy')->name('armas.destroy');

Route::get('laudos/materiais/{laudo_id}', 'Perito\LaudosController@materiais')->name('laudos.materiais');
Route::get('laudos/gerar/{laudo}', 'Perito\LaudosController@generate')->name('laudos.generate');
