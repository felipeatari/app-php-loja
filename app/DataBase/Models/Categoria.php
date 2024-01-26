<?php

namespace App\DataBase\Models;

use App\Components\Model;

class Categoria extends Model
{
  public function __construct()
  {
    parent::__construct('categoria');
  }
}