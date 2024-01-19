<?php

require_once __DIR__ . '/vendor/autoload.php';

$end = (new Src\App\Controller)->end();

Src\App\View::template(content: $end);