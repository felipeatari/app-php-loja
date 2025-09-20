<?php

if (!function_exists('responseJson')) {
  function responseJson(array $data, int $status = 200): void
  {
    header('Content-Type: application/json');
    http_response_code($status);

    $data = json_encode($data);

    die($data);
  }
}

if (!function_exists('dd')) {
  function dd(mixed $debug, $vardump = false): void
  {
    echo '<pre>';

    if ($vardump) {
      var_dump($debug);
    } else {
      print_r($debug);
    }

    echo '</pre>';

    die();
  }
}