<?php

namespace Src\Controller\Controllers\Admin;

use Src\Controller\AppAdmin;

class Produto extends AppAdmin
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