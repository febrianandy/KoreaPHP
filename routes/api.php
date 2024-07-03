<?php

use App\Core\Router;
use App\Controllers\HomeController;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/users/{id}', UserController::class, 'show');

Route::add("POST", '/user', UserController::class, 'create');