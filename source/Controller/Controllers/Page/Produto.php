<?php

namespace Src\Controller\Controllers\Page;

use Src\View\AppView;

class Produto
{
  public function see_product($id = 0)
  {
    AppView::title('Produto: ' . $id);
    AppView::page('produto-ver');

    $produto = [
      'Produto' => [
        'id' => $id,
        'nome' => 'Camisa Oversized 2'
      ],
      'ProdutoFotos' => [],
      'Categorias' => [],
      'Sku' => [],
    ];

    return AppView::render(['id' => $id, 'produto' => $produto]);
  }

  public function list_category()
  {}
}