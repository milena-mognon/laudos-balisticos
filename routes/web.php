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

Route::get('/', 'HomeController@index')->name('home');
Route::get('dashboard', 'Admin\DashboardController@index');

Route::resource('solicitantes', 'Admin\OrgaosSolicitantesController');

Route::get('origens', 'Admin\OrigensController@index')->name('origens.index');
Route::get('origens/create', 'Admin\OrigensController@create')->name('origens.create');
Route::post('origens', 'Admin\OrigensController@store')->name('origens.store');
Route::get('origens/{origem}', 'Admin\OrigensController@show')->name('origens.show');
Route::get('origens/{origem}/edit', 'Admin\OrigensController@edit')->name('origens.edit');
Route::patch('origens/{origem}', 'Admin\OrigensController@update')->name('origens.update');
Route::delete('origens/{origem}', 'Admin\OrigensController@destroy')->name('origens.destroy');




