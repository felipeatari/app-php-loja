<?php

require_once __DIR__ . '/vendor/autoload.php';

$end = (new Src\Controller\AppController)->end();

Src\View\AppView::template(content: $end);