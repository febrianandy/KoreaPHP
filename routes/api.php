<?php

use App\Core\Router;
use App\Controllers\HomeController;
use App\Middlewares\AuthMiddleware;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/login', HomeController::class, 'login');