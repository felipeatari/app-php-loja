<?php

namespace App\Controllers;

use App\Core\View;

class PageErrorController
{
  public static function error($code, $message)
  {
    View::title('Erro ' . $code);
    View::error('error');

    http_response_code($code);

    return View::render('php' , [
      'code' => $code,
      'message' => $message
    ]);
  }

  public static function error_api($code, $message)
  {
    http_response_code($code);

    return json_encode([
      'code' => $code,
      'message' => $message
    ]);
  }
}