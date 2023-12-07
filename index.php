<?php

require_once __DIR__ . '/vendor/autoload.php';

$end = (new App\Core\Controller)->end();

App\Core\View::template(content: $end);