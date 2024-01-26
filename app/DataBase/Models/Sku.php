<?php

namespace App\DataBase\Models;

use App\Components\Model;

class Sku extends Model
{
  public function __construct()
  {
    parent::__construct('sku');
  }
}