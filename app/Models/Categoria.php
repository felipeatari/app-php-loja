<?php

namespace App\Models;

use App\Database\Model;

class Categoria extends Model
{
  public function __construct()
  {
    parent::__construct('categoria');
  }
}