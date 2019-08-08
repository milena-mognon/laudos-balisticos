<?php

Breadcrumbs::register('secoes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Seções', route('secoes.index'));
});

Breadcrumbs::register('secoes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('secoes.index');
    $breadcrumbs->push('Nova Seção', route('secoes.create'));
});

Breadcrumbs::register('secoes.edit', function ($breadcrumbs, $secao) {
    $breadcrumbs->parent('secoes.index', $secao);
    $breadcrumbs->push('Editar Seção', route('secoes.edit', $secao));
});