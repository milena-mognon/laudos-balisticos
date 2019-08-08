<?php

Breadcrumbs::register('origens.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Países', route('origens.index'));
});

Breadcrumbs::register('origens.create', function ($breadcrumbs) {
    $breadcrumbs->parent('origens.index');
    $breadcrumbs->push('Novo País', route('origens.create'));
});

Breadcrumbs::register('origens.edit', function ($breadcrumbs, $origem) {
    $breadcrumbs->parent('origens.index', $origem);
    $breadcrumbs->push('Editar País', route('origens.edit', $origem));
});