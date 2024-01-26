<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/routes/web.php';

$end = (new App\Web\Controller())
?->routes($routes)->router()
?->dispatcher();

App\Components\View::template(content: $end);