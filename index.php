<?php

require_once __DIR__ . '/vendor/autoload.php';

$end = (new Source\Controller\AppController)->end();

Source\View\AppView::template(content: $end);