<?php

namespace App\Web\Controllers;

use App\Components\View;

class MainHome
{
  public function index()
  {
    View::title('Pagina Home');
    View::main('home');

    return View::render();
  }
}