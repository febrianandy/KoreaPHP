<?php

use App\Core\Router;
use App\Controllers\HomeController;
use App\Middlewares\AuthMiddleware;

Router::add('GET', '/', HomeController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/users/{id}', HomeController::class, 'show');
Router::add("POST", '/user', HomeController::class, 'create');
Router::add("GET", '/login', HomeController::class, 'login');