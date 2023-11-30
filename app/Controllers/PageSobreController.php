<?php

namespace App\Controllers;

use App\Core\View;

class PageSobreController
{
  public function index()
  {
    View::title('Pagina Sobre');
    View::page('sobre');

    return View::render('sobre', [
      'ok' => '<h1>Página Sobre de Teste</h1>'
    ]);
  }
}