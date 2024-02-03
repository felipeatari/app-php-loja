<?php

namespace App\Web\Controllers;

use App\Web\Admin;
use App\DataBase\Models\Produto;

class AdminProduto extends Admin
{
  public function categoria()
  {
    parent::title('Admin Produto Categoria');
    parent::admin('admin-produto-categoria');

    $content = [];

    if (isset($_GET['action']) and $_GET['action'] === 'criar') {
      $retorno = $this->categoria_criar($_POST);

      if (isset($retorno['error']) and $retorno['error']) {
        $content['message'] = $retorno['error'];
        $content['type_message'] = $type_message = 'error';
      }
      elseif (isset($retorno['success']) and $retorno['success']) {
        $content['message'] = $retorno['success'];
        $content['type_message'] = 'success';
      }
    }

    parent::content($content);
  }

  private function categoria_criar($dados)
  {
    if (! isset($dados['nome']) or empty($dados['nome'])) {
      return ['error' => 'Campo "nome" deve ser informado ou preenchido'];
    }

    $model_categoria = [
      'parent_id' => $dados['parent_id'] ?? '',
      'nome' => $dados['nome'],
    ];

    return ['success' => 'Categoria criada com sucesso'];
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