<?php

Breadcrumbs::register('marcas.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Marcas', route('marcas.index'));
});

Breadcrumbs::register('marcas.create', function ($breadcrumbs) {
    $breadcrumbs->parent('marcas.index');
    $breadcrumbs->push('Nova Marca', route('marcas.create'));
});

Breadcrumbs::register('marcas.edit', function ($breadcrumbs, $marca) {
    $breadcrumbs->parent('marcas.index', $marca);
    $breadcrumbs->push('Editar Marca', route('marcas.edit', $marca));
});