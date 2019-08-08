<?php

Breadcrumbs::register('users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Usuários', route('users.index'));
});

Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Novo Usuário', route('users.create'));
});

Breadcrumbs::register('users.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('users.index', $user);
    $breadcrumbs->push('Editar Usuário', route('users.edit', $user));
});