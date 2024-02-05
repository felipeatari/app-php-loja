<?php

namespace App\Web\Controllers;

use App\Web\Admin;
use App\Web\Router;
use App\DataBase\Models\Produto;
use App\DataBase\Models\Categoria;

class AdminProduto extends Admin
{
  public function categoria()
  {
    parent::title('Admin Produto Categoria');
    parent::admin('admin-produto-categoria');

    $content = [];

    // pr($_POST);die;

    if (isset($_GET['action']) and $_GET['action'] === 'criar') {
      $this->categoria_criar($_POST);

      Router::redirect('/admin/produto/categorias');
    }
    elseif (isset($_GET['action']) and $_GET['action'] === 'editar') {
      $this->categoria_editar($_POST);

      Router::redirect('/admin/produto/categorias');
    }
    elseif (isset($_GET['action']) and $_GET['action'] === 'apagar') {
      $_GET['id'] = (int) $_GET['id'] ?? 0;

      if ($_GET['id'] > 0) {
        (new Categoria())->delete($_GET['id']);

        Router::redirect('/admin/produto/categorias');
      }
    }

    $content = ['categorias' => (new Categoria())->find()->fetch(true)];

    parent::content($content);
  }

  private function categoria_criar($dados)
  {
    if (! isset($dados['nome']) or empty($dados['nome'])) {
      return;
    }

    $dados['parent_id'] = (int) $dados['parent_id'] ?? 0;

    $categoria = new Categoria;
    $categoria->field('nome', $dados['nome']);
    $categoria->field('parent_id', $dados['parent_id']);
    $categoria->save();
  }

  private function categoria_editar($dados)
  {
    if (! isset($dados['id']) or empty($dados['id'])) {
      return;
    }

    if (! isset($dados['nome']) or empty($dados['nome'])) {
      return;
    }

    $dados['id'] = (int) $dados['id'] ?? 0;
    $dados['parent_id'] = (int) $dados['parent_id'] ?? 0;

    $categoria = new Categoria;
    $categoria->field('nome', $dados['nome']);
    $categoria->field('parent_id', $dados['parent_id']);
    $categoria->update($dados['id']);
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