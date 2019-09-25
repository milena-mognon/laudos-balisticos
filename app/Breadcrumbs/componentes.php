<?php

Breadcrumbs::register('balins_chumbo.create', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.materiais', $laudo);
    $breadcrumbs->push('Novos Balins de Chumbo', route('balins_chumbo.create', $laudo));
});

Breadcrumbs::register('balins_chumbo.edit', function ($breadcrumbs, $laudo, $componente) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push("Editar $componente->componente" , route('balins_chumbo.edit',[ $laudo, $componente]));
});

Breadcrumbs::register('polvora.create', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.materiais', $laudo);
    $breadcrumbs->push('Nova Pólvora', route('polvora.create', $laudo));
});

Breadcrumbs::register('polvora.edit', function ($breadcrumbs, $laudo, $componente) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push("Editar $componente->componente" , route('polvora.edit',[ $laudo, $componente]));
});

Breadcrumbs::register('espoletas.create', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.materiais', $laudo);
    $breadcrumbs->push('Novas Espoletas', route('espoletas.create', $laudo));
});

Breadcrumbs::register('espoletas.edit', function ($breadcrumbs, $laudo, $componente) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push("Editar $componente->componente" , route('espoletas.edit',[ $laudo, $componente]));
});