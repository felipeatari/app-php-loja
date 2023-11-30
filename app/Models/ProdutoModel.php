<?php

namespace App\Models;

use App\Core\Model;

class ProdutoModel extends Model
{
  private static $table_structure = [
    'id INT(11) NOT NULL AUTO_INCREMENT',
    'ativo BOOLEAN NOT NULL',
    'nome VARCHAR(255) NOT NULL',
    'descricao VARCHAR(500) NOT NULL',
    'marca VARCHAR(255) NOT NULL',
    'preco DECIMAL(10, 2) DEFAULT 0.00 NOT NULL',
    'peso DECIMAL(10,3) DEFAULT 0.000 NOT NULL',
    'largura DECIMAL(10, 2) DEFAULT 0.00',
    'altura DECIMAL(10, 2) DEFAULT 0.00',
    'comprimento DECIMAL(10, 2) DEFAULT 0.00',
    'primary key(id)'
  ];

  public static function table_structure()
  {
    return self::$table_structure;
  }
}