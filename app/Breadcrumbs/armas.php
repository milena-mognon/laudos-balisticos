<?php

Breadcrumbs::register('armas.create', function ($breadcrumbs, $laudo) {
    $breadcrumbs->parent('laudos.materiais', $laudo);
    $breadcrumbs->push('Nova Arma', route('armas.create', $laudo));
});

Breadcrumbs::register('armas.edit', function ($breadcrumbs, $laudo, $arma) {
    $breadcrumbs->parent('laudos.show', $laudo);
    $breadcrumbs->push("Editar $arma->tipo_arma" , route('armas.edit',[ $laudo, $arma]));
});