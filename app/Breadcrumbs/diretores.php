<?php

Breadcrumbs::register('diretores.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Diretores', route('diretores.index'));
});

Breadcrumbs::register('diretores.create', function ($breadcrumbs) {
    $breadcrumbs->parent('diretores.index');
    $breadcrumbs->push('Novo Diretor', route('diretores.create'));
});

Breadcrumbs::register('diretores.edit', function ($breadcrumbs, $diretor) {
    $breadcrumbs->parent('diretores.index', $diretor);
    $breadcrumbs->push('Editar Diretor', route('diretores.edit', $diretor));
});