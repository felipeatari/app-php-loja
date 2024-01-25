<?php

require_once __DIR__ . '/vendor/autoload.php';

$end = (new App\Components\Controller)->end();

App\Components\View::template(content: $end);