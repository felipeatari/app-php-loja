<?php

namespace Src\Controllers;

use Src\App\View;

class PageHome
{
  public function index()
  {
    View::title('Pagina Home');
    View::page('home');

    return View::render();
  }
}