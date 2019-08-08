<?php

Breadcrumbs::register('calibres.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Calibres', route('calibres.index'));
});

Breadcrumbs::register('calibres.create', function ($breadcrumbs) {
    $breadcrumbs->parent('calibres.index');
    $breadcrumbs->push('Novo Calibre', route('calibres.create'));
});

Breadcrumbs::register('calibres.edit', function ($breadcrumbs, $calibre) {
    $breadcrumbs->parent('calibres.index', $calibre);
    $breadcrumbs->push('Editar Calibre', route('calibres.edit', $calibre));
});