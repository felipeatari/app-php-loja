<?php

namespace Src\Controller\Controllers\Page;

use Src\View\AppView;

class Login
{
  public function index()
  {
    AppView::title('Tela de Login');
    AppView::page('login');

    return AppView::render();
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