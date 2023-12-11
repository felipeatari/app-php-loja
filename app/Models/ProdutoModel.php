<?php

namespace App\Models;

use App\Core\Model;

class ProdutoModel extends Model
{
  public function __construct()
  {
    parent::__construct('produto');

    $this->fields = [
      'nome' => '',
      'categoria_id' => '',
    ];
  }

  public function nome(string $nome)
  {
    $this->fields['nome'] = $nome;
  }

  public function categoria_id(int $categoria_id)
  {
    $this->fields['categoria_id'] = $categoria_id;
  }
}