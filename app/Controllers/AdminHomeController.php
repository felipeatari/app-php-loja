<?php

namespace App\Controllers;

use App\Core\Model;

class AdminHomeController
{
  public function index()
  {
    $teste = Model::init('nome');

    if (is_null($teste)) {
      pr('Model não encontrada');die;
    }

    // json_validate();
    // libxml_use_internal_errors();

    pr($teste->find(['sort' => 'asc']));die;
  }
}