<?php

namespace Source\Controller\Controllers;

use Source\View\AppView;

class PageProdutoController
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