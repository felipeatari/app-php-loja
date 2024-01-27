<?php

namespace App\Web\Controllers;

use App\Components\Template;

class MainProduto
{
  public function full_products()
  {
    $cat = $_GET['cat'] ?? '';
    $tipo = $_GET['tipo'] ?? '';

    if (empty($cat) or empty($tipo)) return 'error';

    Template::title(ucfirst($cat) . 's ' . ucfirst($tipo));

    return '<br><br>Categoria: ' . $cat . ' - Tipo: ' . $tipo . '<br><br><br><br>';
  }

  public function see_product($id = 0)
  {
    Template::title('Produto: ' . $id);
    Template::main('produto-ver');

    $produto = [
      'Produto' => [
        'id' => $id,
        'nome' => 'Camisa Oversized 2'
      ],
      'ProdutoFotos' => [],
      'Categorias' => [],
      'Sku' => [],
    ];

    return Template::view(['id' => $id, 'produto' => $produto]);
  }

  public function list_category()
  {}
}