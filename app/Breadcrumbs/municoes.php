<?php

Breadcrumbs::register('armas_curtas.create', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.materiais', $laudo);
    $breadcrumbs->push('Nova Munição', route('armas_curtas.create', $laudo));
});

Breadcrumbs::register('armas_curtas.edit', function ($breadcrumbs, $laudo, $municao) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push("Editar $municao->tipo_municao" , route('armas_curtas.edit',[ $laudo, $municao]));
});

Breadcrumbs::register('armas_longas.create', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.materiais', $laudo);
    $breadcrumbs->push('Nova Munição', route('armas_longas.create', $laudo));
});

Breadcrumbs::register('armas_longas.edit', function ($breadcrumbs, $laudo, $municao) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push("Editar $municao->tipo_municao" , route('armas_longas.edit',[ $laudo, $municao]));
});