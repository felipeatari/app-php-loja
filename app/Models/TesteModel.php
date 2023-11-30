<?php

namespace App\Models;

use App\Core\Model;

class TesteModel extends Model
{
  public static $table_structure = [
    'id INT NOT NULL AUTO_INCREMENT',
    'nome_teste VARCHAR(45) NOT NULL',
    'descricao text',
    'peso DECIMAL(10,3) DEFAULT 1.5',
    'PRIMARY KEY (id)'
  ];

  public static function table_structure()
  {
    return self::$table_structure;
  }
}