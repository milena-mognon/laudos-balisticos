<?php

Breadcrumbs::register('revolveres.create', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.materiais', $laudo);
    $breadcrumbs->push('Novo Revólver', route('revolveres.create', $laudo));
});

Breadcrumbs::register('revolveres.edit', function ($breadcrumbs, $laudo, $arma) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push("Editar $arma->tipo_arma" , route('revolveres.edit',[ $laudo, $arma]));
});

Breadcrumbs::register('espingardas.create', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.materiais', $laudo);
    $breadcrumbs->push('Nova Espingarda', route('espingardas.create', $laudo));
});

Breadcrumbs::register('espingardas.edit', function ($breadcrumbs, $laudo, $arma) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push("Editar $arma->tipo_arma" , route('espingardas.edit',[ $laudo, $arma]));
});