<?php

namespace App\Web\Controllers;

use App\Web\Admin;
use App\DataBase\Models\Produto;
use App\DataBase\Models\Categoria;

class AdminProduto extends Admin
{
  public function categoria()
  {
    parent::title('Admin Produto Categoria');
    parent::admin('admin-produto-categoria');

    $content = [];

    if (isset($_GET['action']) and $_GET['action'] === 'criar') {
      $content = $this->categoria_criar($_POST);
    }
    else {
      $content = ['categorias' => (new Categoria())->find()->fetch(true)];
    }

    parent::content($content);
  }

  private function categoria_criar($dados)
  {
    if (! isset($dados['nome']) or empty($dados['nome'])) {
      return [
        'message' => 'Campo "nome" deve ser informado ou preenchido',
        'type_message' => 'error'
      ];
    }

    $model_categoria = [
      'parent_id' => $dados['parent_id'] ?? '',
      'nome' => $dados['nome'],
    ];

    return [
      'message' => 'Categoria criada com sucesso',
      'type_message' => 'error'
    ];
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