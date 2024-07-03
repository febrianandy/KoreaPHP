<?php

use App\Core\Router;

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../config/config.php";

// Include the route definitions
require_once __DIR__ . '/../routes/api.php';

// Dispatch the route
Router::dispatch();
