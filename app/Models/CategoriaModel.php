<?php

namespace App\Models;

use App\Core\Model;

class CategoriaModel extends Model
{
  private static $table_structure = [
    'id INT(11) NOT NULL AUTO_INCREMENT',
    'ativo BOOLEAN NOT NULL', // Se essa categoria tiver ativa, recebe true, caso contrário false
    'parent INT(11)', // Se for Categoria pai recebe 0. Se for categoria filho recebe o id da categoria pai
    'tipo VARCHAR(255)', // modelo, marca, estilo, tecido, etc...
    'nome VARCHAR(255) NOT NULL',
    'primary key(id)'
  ];

  public static function table_structure()
  {
    return self::$table_structure;
  }
}