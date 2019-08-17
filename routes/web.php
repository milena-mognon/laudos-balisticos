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

Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

Route::get('unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');

/* Admin routes */
Route::prefix('admin')->middleware('cargo:Administrador')->group(function () {
    Route::resource('solicitantes', 'Admin\OrgaosSolicitantesController')->except(['show']);
    Route::resource('users', 'Admin\UsersController')->except(['show']);
    Route::resource('marcas', 'Admin\MarcasController')->except(['show']);
    Route::resource('calibres', 'Admin\CalibresController')->except(['show']);
    Route::resource('secoes', 'Admin\SecoesController')
        ->parameters(['secoes' => 'secao'])->except(['show']);
    Route::resource('origens', 'Admin\OrigensController')
        ->parameters(['origens' => 'origem'])->except(['show']);
    Route::resource('diretores', 'Admin\DiretoresController')
        ->parameters(['diretores' => 'diretor'])->except(['show']);
});

/* Peritos routes */
Route::resource('laudos', 'Perito\LaudosController');

Route::get('laudos/solicitantes/cidade/{cidade_id}',
    'Admin\OrgaosSolicitantesController@filtrar_por_cidade')->name('solicitantes.filtrar');

Route::post('laudos/armas/{arma}/images', 'Perito\ArmasController@store_image')->name('armas.images');

Route::prefix('laudos/{laudo}')->group(function () {
    Route::resource('armas', 'Perito\ArmasController')->except(['destroy']);
});

Route::delete('armas/{arma}', 'Perito\ArmasController@destroy')->name('armas.destroy');
Route::get('materiais/{laudo}', 'Perito\LaudosController@materiais')->name('laudos.materiais');
Route::get('gerar_docx/{laudo}', 'Perito\LaudosController@generate_docx')->name('laudos.docx');
