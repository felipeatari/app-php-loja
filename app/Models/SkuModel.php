<?php

namespace App\Models;

use App\Core\Model;

class SkuModel extends Model
{
  public $table_structure = [
    'id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'produto_id INT(11) NOT NULL',
    'sku_var_id INT(11) NOT NULL',
    'nome VARCHAR(255) NOT NUL',
    'marca VARCHAR(255) NOT NUL',
    'preco DECIMAL(10, 2) NOT NULL',
    'descricao VARCHAR(500) NOT NUL',
    'estoque INT(11) NOT NUL',
    'peso DECIMAL(10,3) NOT NULL',
    'largura DECIMAL(10, 2) NOT NULL',
    'altura DECIMAL(10, 2) NOT NULL',
    'comprimento DECIMAL(10, 2) NOT NULL',
    'primary key(id)',
    'foreign key (produto_id) references produto(id)'
  ];
}