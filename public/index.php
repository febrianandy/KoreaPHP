<?php

use App\Core\Router;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/config.php";

require_once __DIR__ . '/../routes/api.php';

Router::run();
