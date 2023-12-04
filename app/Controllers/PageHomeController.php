<?php

namespace App\Controllers;

use App\Core\View;
use App\Controllers\PageErrorController;

class PageHomeController
{
  public function index()
  {
    View::title('Pagina Home');
    View::page('home');

    return View::render('php', [
      'url' => URL
    ]);
  }
}