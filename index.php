<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Web\Controller;

$web = new App\Web\Controller();

require_once __DIR__ . '/routes/web.php';

$end = $web?->router()?->dispatcher();

App\Components\View::template(content: $end);