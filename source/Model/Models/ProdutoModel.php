<?php

namespace Src\Model\Models;

use Src\Model\AppModel;

class ProdutoModel extends AppModel
{
  public function __construct()
  {
    parent::__construct('produto');
  }
}