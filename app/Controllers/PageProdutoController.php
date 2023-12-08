<?php

namespace App\Controllers;

use App\Core\View;

class PageProdutoController
{
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