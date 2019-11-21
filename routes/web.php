<?php

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
    Route::get('relatorios/index', 'Admin\RelatoriosController@index')
        ->name('admin.relatorios.index');
    Route::get('relatorios/todos_laudos', 'Admin\RelatoriosController@relatorio_completo')
        ->name('admin.relatorios.relatorio_completo');
    Route::post('relatorios/create_custom_report', 'Admin\RelatoriosController@create_custom_report')
        ->name('admin.relatorios.personalizados');
});
Route::get('admin/laudos/search/{rep}', 'Admin\LaudosController@search')->name('admin.laudos.search');
Route::get('admin/users/search/{nome}', 'Admin\UsersController@search')->name('users.search');
Route::get('admin/laudos', 'Admin\LaudosController@index')->name('admin.laudos.index');
/* Peritos routes */
Route::resource('laudos', 'Perito\LaudosController')->except(['edit']);

Route::get('laudos/search/{rep}', 'Perito\LaudosController@search')->name('laudos.search');

Route::get('laudos/solicitantes/cidade/{cidade_id}',
    'Perito\OrgaosSolicitantesController@filtrar_por_cidade')->name('solicitantes.filtrar');

Route::post('laudos/armas/{arma}/images', 'Perito\ArmasController@store_image')->name('armas.images');
Route::delete('laudos/armas/{arma}/images', 'Perito\ArmasController@delete_image')->name('armas.images.delete');

Route::prefix('laudos/{laudo}')->group(function () {
    Route::get('materiais', 'Perito\LaudosController@materiais')->name('laudos.materiais');
    Route::get('gerar_docx', 'Perito\LaudosController@generate_docx')->name('laudos.docx');
    Route::resource('revolveres', 'Perito\Armas\RevolveresController')
        ->parameters(['revolveres' => 'revolver']);
    Route::resource('espingardas', 'Perito\Armas\EspingardasController');
    Route::resource('espingardas_artesanais', 'Perito\Armas\EspingardasArtesanaisController')
        ->parameters(['espingardas_artesanais' => 'espingarda']);
    Route::resource('garruchas', 'Perito\Armas\GarruchasController');
    Route::resource('pistolas', 'Perito\Armas\PistolasController');
    Route::delete('armas/{arma}', 'Perito\ArmasController@destroy')->name('armas.destroy');

    Route::resource('municoes', 'Perito\Municoes\MunicoesController')
        ->parameters(['municoes' => 'municao'])->except(['create', 'index', 'show']);

    Route::resource('municoes/armas_curtas', 'Perito\Municoes\ArmasCurtasController')
        ->parameters(['armas_curtas' => 'municao'])->only(['create', 'edit', 'show']);

    Route::resource('municoes/armas_longas', 'Perito\Municoes\ArmasLongasController')
        ->parameters(['armas_longas' => 'municao'])->only(['create', 'edit', 'show']);

    Route::resource('componentes', 'Perito\Componentes\ComponentesController')
        ->except(['create', 'index']);

    Route::resource('componentes/balins_chumbo', 'Perito\Componentes\BalinsChumboController')
        ->parameters(['balins_chumbo' => 'componente'])->only(['create', 'edit']);
    Route::resource('componentes/espoletas', 'Perito\Componentes\EspoletasController')
        ->parameters(['espoletas' => 'componente'])->only(['create', 'edit']);
    Route::resource('componentes/polvora', 'Perito\Componentes\PolvoraController')
        ->parameters(['polvora' => 'componente'])->only(['create', 'edit']);
});

Route::post('solicitantes', 'Perito\OrgaosSolicitantesController@store')->name('perito.solicitante.store');
Route::post('marcas', 'Perito\MarcasController@store')->name('perito.marcas.store');
Route::post('calibres', 'Perito\CalibresController@store')->name('perito.calibres.store');
Route::post('origens', 'Perito\OrigensController@store')->name('perito.origens.store');