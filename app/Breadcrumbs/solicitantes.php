<?php

Breadcrumbs::register('solicitantes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Órgãos Solicitantes', route('solicitantes.index'));
});

Breadcrumbs::register('solicitantes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('solicitantes.index');
    $breadcrumbs->push('Novo Órgão Solicitante', route('solicitantes.create'));
});

Breadcrumbs::register('solicitantes.edit', function ($breadcrumbs, $solicitante) {
    $breadcrumbs->parent('solicitantes.index', $solicitante);
    $breadcrumbs->push('Editar Órgão Solicitante', route('solicitantes.edit', $solicitante));
});