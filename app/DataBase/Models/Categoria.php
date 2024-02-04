<?php

namespace App\DataBase\Models;

use App\Database\Model;

class Categoria extends Model
{
  public function __construct()
  {
    parent::__construct('categoria');
  }
}