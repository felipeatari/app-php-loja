<?php

namespace Src\Controllers;

use Src\App\View;

class PageProduto
{
  public function full_products()
  {
    $cat = $_GET['cat'] ?? '';
    $tipo = $_GET['tipo'] ?? '';

    if (empty($cat) or empty($tipo)) return 'error';

    return '<br><br>Categoria: ' . $cat . ' - Tipo: ' . $tipo . '<br><br><br><br>';
  }

  public function see_product($id = 0)
  {
    View::title('Produto: ' . $id);
    View::page('produto-ver');

    $produto = [
      'Produto' => [
        'id' => $id,
        'nome' => 'Camisa Oversized 2'
      ],
      'ProdutoFotos' => [],
      'Categorias' => [],
      'Sku' => [],
    ];

    return View::render(['id' => $id, 'produto' => $produto]);
  }

  public function list_category()
  {}
}