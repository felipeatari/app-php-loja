<?php

namespace Source\Controller\Controllers;

use Source\View\AppView;

class PageErrorController
{
  public static function error($code, $message)
  {
    AppView::title('Erro ' . $code);
    AppView::error('error');

    http_response_code($code);

    return AppView::render([
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