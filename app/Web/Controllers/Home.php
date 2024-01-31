<?php

namespace App\Web\Controllers;

use App\Components\Template;

class Home
{
  public function index()
  {
    Template::title('Pagina Home');
    Template::main('home');

    return Template::view();
  }
}