<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Web\Router;

$web = new App\Web\Router();

require_once __DIR__ . '/routes/web.php';

$end = $web?->on()?->dispatcher();

App\Components\Template::load(content: $end);