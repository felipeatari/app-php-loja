<?php

namespace App\Models;

use App\Core\Model;

class CategoriaModel extends Model
{
  public function __construct()
  {
    parent::__construct('categoria');

    $this->fields = [
      'nome' => '',
      'parent_id' => 0
    ];
  }

  public function nome(string $nome)
  {
    $this->fields['nome'] = $nome;
  }

  public function parent_id(int $parent_id)
  {
    $this->fields['parent_id'] = $parent_id;
  }
}