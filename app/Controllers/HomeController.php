<?php

namespace App\Controllers;

use App\Components\View;

class HomeController
{
  public function index()
  {
    View::title('Pagina Home');
    View::main('home');

    return View::view();
  }
}