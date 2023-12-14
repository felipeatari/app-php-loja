<?php

namespace Src\Controller\Controllers\Admin;

use Src\Controller\Admin;

class AdminProdutoController extends Admin
{
  public function listar()
  {
    parent::title('Lista Produto');
    parent::admin('produto_listar');
    parent::content();
  }

  public function cadastrar()
  {
    parent::title('Cadastrar Produto');
    parent::admin('produto_cadastrar');
    parent::content();
  }
}