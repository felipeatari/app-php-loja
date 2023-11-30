<?php

namespace App\Models;

use App\Core\Model;

class ProdutoCategoriaModel extends Model
{
  private static $table_structure = [
    'id INT(11) NOT NULL AUTO_INCREMENT',
    'produto_id INT(11) NOT NULL',
    'categoria_id INT(11) NOT NULL',
    'primary key(id)',
    'foreign key (produto_id) references produto(id)',
    'foreign key (categoria_id) references categoria(id)'
  ];

  public static function table_structure()
  {
    return self::$table_structure;
  }
}