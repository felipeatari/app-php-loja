<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Router;
use App\Components\View;

$router = new App\Http\Router();

require_once __DIR__ . '/config/routes.php';

$end = $router?->on()?->dispatcher();

View::layout(content: $end);