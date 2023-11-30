<?php

namespace App\Models;

use App\Core\Model;

class SkuVariacaoModel extends Model
{
  public $table_structure = [
    'id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'sku_id INT(11) NOT NULL',
    'variacao_id INT(11) NOT NULL',
    'primary key(id)',
    'foreign key (sku_id) references sku(id)',
    'foreign key (variacao_id) references variacao(id)'
  ];
}