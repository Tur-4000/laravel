<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('cabinet', function ($trail) {
    $trail->parent('home');
    $trail->push('Cabinet', route('cabinet'));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('Register', route('register'));
});

Breadcrumbs::for('password.confirm', function ($trail) {
    $trail->parent('register');
    $trail->push('Password confirm', route('password.confirm'));
});

Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('login');
    $trail->push('Reset Password', route('password.request'));
});

Breadcrumbs::for('password.reset', function ($trail, $token) {
    $trail->parent('password.request');
    $trail->push('Change Password', route('password.reset', $token));
});