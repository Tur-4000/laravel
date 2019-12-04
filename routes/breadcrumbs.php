<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('password_reset', function ($trail) {
    $trail->parent('login');
    $trail->push('Reset Password', route('password.request'));
});