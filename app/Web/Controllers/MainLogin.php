<?php

namespace App\Web\Controllers;

use App\Components\Template;

class MainLogin
{
  public function index()
  {
    Template::title('Tela de Login');
    Template::main('login');

    return Template::view();
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