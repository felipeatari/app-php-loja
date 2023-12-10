<?php

namespace App\Models;

use App\Core\Model;

class ProdutoModel extends Model
{
  public $nome;

  public function __construct()
  {
    parent::__construct('produto');
  }
}