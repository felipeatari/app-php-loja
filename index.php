<?php

ini_set('display_errors', 1);
ini_set('serialize_precision', -1);
date_default_timezone_set('America/Fortaleza');
error_reporting(E_ERROR | E_WARNING);

require_once(__DIR__ . '/vendor/autoload.php');

$controller = new App\Core\Controller();

include_once(__DIR__ . '/config/routes.php');

$controller->router();
$dispatcher = $controller->dispatcher();

App\Core\View::template($dispatcher);