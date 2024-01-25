<?php

namespace App\Controllers;

use App\Components\View;

class MainLogin
{
  public function index()
  {
    View::title('Tela de Login');
    View::main('login');

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