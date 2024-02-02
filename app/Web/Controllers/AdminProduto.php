<?php

namespace App\Web\Controllers;

use App\Web\Admin;
use App\DataBase\Models\Produto;

class AdminProduto extends Admin
{
  public function Categoria()
  {
    parent::title('Admin Produto Categoria');
    parent::admin('admin-produto-categoria');

    parent::content();
  }

  public function listar()
  {
    parent::title('Lista Produto');
    parent::admin('admin-produto-listar');

    $produtos = (new Produto)->find()->fetch(true);

    parent::content(['produtos' => $produtos]);
  }

  public function cadastrar()
  {
    parent::title('Cadastrar Produto');
    parent::admin('admin-produto-cadastrar');
    parent::content();
  }

  public function salvar()
  {
    pr($_POST);
    die;
    parent::title('Cadastrar Produto');
    parent::admin('admin-produto-cadastrar');
    parent::content();
  }
}