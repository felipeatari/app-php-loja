<?php

namespace Src\Controllers;

use Src\App\View;

class PageLogin
{
  public function index()
  {
    View::title('Tela de Login');
    View::page('login');

    return View::render();
  }

  public function entrar()
  {
    if (isset($_POST['login']) or isset($_POST['senha'])) {
      return 'Verifique os campos';
    }

    if (empty($_POST['login']) or empty($_POST['senha'])) {
      return 'Acesso negado';
    }

    return 'Logado com sucesso';
  }
}