<?php

namespace App\Controllers;

use App\Components\View;

class PageHome
{
  public function index()
  {
    View::title('Pagina Home');
    View::page('home');

    return View::render();
  }
}