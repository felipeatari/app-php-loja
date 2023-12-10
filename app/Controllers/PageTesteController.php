<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\TesteModel;
use App\Models\ProdutoModel;
use App\Core\Model;
use App\Source\DataBase;

class PageTesteController
{
  public function teste()
  {
    // $json = '{"status": true}';

    // try {
    //   $json = json_decode($json, true, flags: JSON_THROW_ON_ERROR);
    // } catch (\JsonException) {
    //   pr('JSON inválido');die;
    // }

    $json = "['status' => true]";

    try {
      $json = json_validate($json);
    } catch (\JsonException) {
      pr('JSON inválido');die;
    }

    pr($json);die;
  }

  public function index()
  {
    $produtos = new ProdutoModel();

    pr($produtos->find_id(9)->fetch());die;
    // $find = $produtos->find(['id', 'preco'])
    // $find = $produtos->find_id(8)
    $find = $produtos->find()
    ?->condition(['id' => 10])
    // ?->condition(['id' => 1], 'or')
    // ?->condition(['id < ' => 3], 'or')
    // ?->condition(['nome' => 'Camisa Long Line'])
    // ?->order('preco', 'ASC')
    // ?->order()
    // ?->paginator(1, 2)
    // ?->limit(1)
    ?->fetch();
    pr($find);
    // if ($produtos->code_error()) pr($produtos->code_error());
    die;

    $produtos = new ProdutoModel;
    $produtos->ativo(true);
    $produtos->nome('Camisa Basica Linho 17');
    $produtos->descricao('Camisa Basica Linho, Camisa Basica Linho, Camisa Basica Linho');
    $produtos->marca('Baruk 2');
    $produtos->preco(87.00);
    $produtos->peso(0.400);
    $produtos->largura(11);
    $produtos->altura(3);
    $produtos->comprimento(25);

    if ($produtos->code_error()) {
      pr([$produtos->code_error(), $produtos->message_error()]);die;
    };

    // pr($find = $produtos->save());die;
    // pr($find = $produtos->update(8));die;
    // pr($find = $produtos->delete(8));die;

    // pr((new ProdutoModel)->find()->fetch());

    die;
  }

  public function api()
  {
    header('Content-Type: application/json');
    die(json_encode(['status' => true]));
  }
}