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

    pr($produtos->find_id(2)->fetch());die;
    // pr($produtos->find()->fetch());die;

    $find = $produtos->find()
    // $find = $produtos->find(['id', 'nome']) // Traz os campos ID e nome
    ?->condition(['id' => [3, 7, 9]]) // Traz todos os IDs informados

    // ?->condition(['id > ' => 3], 'AND') // Traz todos os IDs maior que 3 e
    // ?->condition(['id < ' => 7]) // Todos os IDs menor que 7

    // ?->condition(['id' => 8], 'OR') // Traz o ID 4 ou
    // ?->condition(['nome' => 'Camisa Long Line']) // A camisa de nome 'Camisa Long Line'

    ?->order() // Se não passar nada traz em ordem decrescente
    // ?->order('nome', 'ASC') // Ordena por nome em ordem acescente

    // ?->paginator(1, 2) // Parâmetro 1 é de onde começa e o 2 é a quantidade por página
    ?->limit(3) // Limita a quantidade de resultados
    ?->fetch();

    if ($produtos->error()) {
      pr($produtos->code_error());
      pr($produtos->message_error());
      die;
    }

    // pr($find);die;

    foreach ($find as $object):
      pr('ID: ' . $object->id);
      pr('Nome: ' . $object->nome);
      pr('<hr>');
    endforeach;die;

    $produtos = new ProdutoModel;
    $produtos->ativo(true);
    $produtos->nome('Camisa Basica Teste');
    $produtos->descricao('Camisa Basica Teste, Camisa Basica Teste, Camisa Basica Teste');
    $produtos->marca('Baruk 2');
    $produtos->preco(55.00);
    $produtos->peso(0.200);
    $produtos->largura(11);
    $produtos->altura(3);
    $produtos->comprimento(25);

    if ($produtos->code_error()) {
      pr([$produtos->code_error(), $produtos->message_error()]);die;
    };

    pr($find = $produtos->save());die;
    // pr($find = $produtos->update(8));die;
    // pr($find = $produtos->delete(8));die;
    die;
  }

  public function api()
  {
    header('Content-Type: application/json');
    die(json_encode(['status' => true]));
  }
}