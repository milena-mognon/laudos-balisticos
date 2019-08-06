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

Route::resources([
    'solicitantes' => 'Admin\OrgaosSolicitantesController',
    'users' => 'Admin\UsersController',
    'marcas' => 'Admin\MarcasController',
    'calibres' => 'Admin\CalibresController',
]);

Route::resource('secoes', 'Admin\SecoesController')->parameters([
    'secoes' => 'secao'
])->except(['show']);

Route::resource('origens', 'Admin\OrigensController')->parameters([
    'origens' => 'origem'
])->except(['show']);

Route::resource('diretores', 'Admin\DiretoresController')->parameters([
    'diretores' => 'diretor'
])->except(['show']);

/* Peritos routes */
Route::resource('laudos', 'Perito\LaudosController');

Route::get('laudos/solicitantes/cidade/{cidade_id}', 'Admin\OrgaosSolicitantesController@filtrar_por_cidade')->name('solicitantes.filtrar');

Route::prefix('laudos/{laudo}')->group(function () {
    Route::get('armas', 'Perito\ArmasController@index')->name('armas.index');
    Route::get('armas/create', 'Perito\ArmasController@create')->name('armas.create');
    Route::post('armas', 'Perito\ArmasController@store')->name('armas.store');
    Route::get('armas/{arma}/edit', 'Perito\ArmasController@edit')->name('armas.edit');
    Route::patch('armas/{arma}', 'Perito\ArmasController@update')->name('armas.update');
    Route::delete('armas/{arma}', 'Perito\ArmasController@destroy')->name('armas.destroy');
});

Route::get('materiais/{laudo}', 'Perito\LaudosController@materiais')->name('laudos.materiais');
Route::get('gerar_docx/{laudo}', 'Perito\LaudosController@generate_docx')->name('laudos.docx');
//Route::get('gerar_pdf/{laudo}', 'Perito\LaudosController@generate_pdf')->name('laudos.pdf');