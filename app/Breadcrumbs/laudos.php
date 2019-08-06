<?php

Breadcrumbs::register('laudos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Laudos', route('laudos.index'));
});

Breadcrumbs::register('laudos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('laudos.index');
    $breadcrumbs->push('Novo Laudo', route('laudos.create'));
});

Breadcrumbs::register('laudos.show', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.index');
    $breadcrumbs->push("Laudo $laudo->rep", route('laudos.show', $laudo));
});

Breadcrumbs::register('laudos.edit', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push('Editar Laudo', route('laudos.edit', $laudo));
});

Breadcrumbs::register('laudos.materiais', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push('Selecionar Material', route('laudos.materiais', $laudo));
});