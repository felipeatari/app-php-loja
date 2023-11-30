<?php

namespace App\Controllers;

use App\Core\View;

class PageHomeController
{
  public function index()
  {
    View::title('Pagina Home');
    View::page('home');

    return View::render('home', [
      'url' => URL
    ]);
  }
}