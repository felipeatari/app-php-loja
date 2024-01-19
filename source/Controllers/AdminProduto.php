<?php

namespace Src\Controllers;

use Src\Components\Admin;

class AdminProduto extends Admin
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