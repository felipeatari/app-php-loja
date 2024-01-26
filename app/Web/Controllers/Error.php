<?php

namespace App\Web\Controllers;

use App\Components\View;

class Error
{
  public static function error($code, $message)
  {
    View::title('Erro ' . $code);
    View::error('error');

    http_response_code($code);

    return View::render([
      'code' => $code,
      'message' => $message
    ]);
  }

  public static function error_api($code, $message)
  {
    header('Content-Type: application/json');
    http_response_code($code);

    die(json_encode([
      'code' => $code,
      'message' => $message
    ]));
  }
}