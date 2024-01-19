<?php

namespace Src\Controllers;

use Src\App\View;

class PageProduto
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