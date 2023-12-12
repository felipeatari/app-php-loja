<?php

namespace App\Models;

use App\Core\Model;
use App\Models\CategoriaModel;

class ProdutoModel extends Model
{
  public function __construct()
  {
    parent::__construct('produto');
  }

  public function categoria(int $categoria_id)
  {
    return (new CategoriaModel)->find_id($categoria_id)->fetch();
  }
}