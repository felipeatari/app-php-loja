<?php

namespace App\Models;

use App\Core\Model;

class VariacaoModel extends Model
{
  public $table_structure = [
    'id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'tipo INT(11) NOT NUL', // Cor: 1 e Tamanho: 2
    'nome VARCHAR(255) NOT NUL',
    'extra VARCHAR(255)', // Código RGB/Hexadecimal de cores ou tamanho
    'primary key(id)'
  ];
}