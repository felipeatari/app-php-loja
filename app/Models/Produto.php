<?php

namespace App\Models;

use App\Database\Model;

class Produto extends Model
{
  public function __construct()
  {
    parent::__construct('produto');
  }
}