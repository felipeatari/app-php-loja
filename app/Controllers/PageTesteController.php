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
    // $connect = DataBase::connect();
    // if (DataBase::db_error()) {
    //   pr(DataBase::db_error_data()->message);
    // }
    // else {
    //   pr($connect);
    // }
    // die;
    // pr(Model::init('produto')->create_table());die;
    // $teste = Model::init('produto')->query();

    // $search = "SELECT * FROM produto";
    // $connect = DataBase::connect();
    // $stmt = $connect->prepare($search);

    // $stmt->execute();

    // $produtos = $stmt->fetchAll(\PDO::FETCH_CLASS, \App\Models\ProdutoModel::class);

    $produto = new ProdutoModel;
    $produtos = $produto->query([
      // 'conditions' => [
      //   'comparisons' => [
      //     'id' => [2],
      //     'nome' => ['Camisa Long Line'],
      //     'marca' => ['Lucky Jeans']
      //   ],
      //   'logical_operators' => [
      //     'and',
      //     'or'
      //   ]
      // ]
      // 'inputs' => ['id'],
    ]);
    pr($produtos);
    // foreach ($produtos as $linha):
    //   pr($linha);
    // endforeach;
    die;
    // die;

    // $query_categorias = Model::init('produto')->query([
    //   'inner_join' => [
    //     'join' => 'produto_categoria',
    //     'type_join' => 'left',
    //     // 'type_join' => 'inner',
    //     'primary_key' => 'id',
    //     'foreign_key' => 'produto_id',
    //     'join_id' => '2',
    //     'fields' => ['categoria_id']
    //   ],
    //   'conditions' => [
    //     'comparisons' => [
    //       // 'id = ' => 1, // Key e o operador de comparação (=, !=, <, >, <= e >=) separado por espaço
    //       'produto_id' => 3, // Se for igual, o sinal de = pode ser omitido
    //     ],
    //     'logical_operators' => ['or'], // Operador lógico: or ou and
    //     // Para o campo logical_operators é necessário que a quantidade de campos a serem informados\n
    //     // seja proporcional a quantidade de operadores lógicos com campos a serem associados
    //     // Se ['conditions' => ['idade > ' => 18, 'peso < ' => 56, 'altura > ' => 1.5]]
    //     // Então [conditions => ['logical_operators' => 'and', 'or']
    //   ],
    // ], true);

    // pr($query_categorias);die;

    // $categoria_ids = [];

    // foreach ($query_categorias as $categoria):
    //   $categoria_ids[] = $categoria['categoria_id'];
    // endforeach;

    // pr($categoria_ids);

    // $query_categorias = Model::init('categoria')->query([
    //   'conditions' => [
    //     'comparisons' => [
    //       'id' => ['32', '5'], // Key e o operador de comparação (=, !=, <, >, <= e >=) separado por espaço
    //       'id' => $categoria_ids, // Key e o operador de comparação (=, !=, <, >, <= e >=) separado por espaço
    //     ]
    //   ]
    // ], true);

    // pr($query_categorias);
    // die;

    // $categorias = [];

    // foreach ($query_categorias as $row):
    //   $categorias[] = Model::init('categoria')->query_id($row['categoria_id']);
    // endforeach;

    // pr($categorias);
    // die;

    // pr(Model::init('teste')->query(['limit' => 1]));
    // pr(Model::init('produto_categoria')->query(api: true));
    // pr(Model::init('produto_categoria')->query([
    //   'inner_join' => [
    //     'join' => 'produto',
    //     'primary_key' => 'produto_id',
    //     'foreign_key' => 'id',
    //     'value' => '2',
    //     'fields' => ['categoria_id']
    //   ]
      // 'conditions' => [
        // 'comparison' => [
        //   // 'id = ' => 1, // Key e o operador de comparação (=, !=, <, >, <= e >=) separado por espaço
        //   'produto_id' => 3, // Se for igual, o sinal de = pode ser omitido
        // ],
        // 'logic' => ['or'], // Operador lógico: or ou and
        // Para o campo logic é necessário que a quantidade de campos a serem informados\n
        // seja proporcional a quantidade de operadores lógicos com campos a serem associados
        // Se ['conditions' => ['idade > ' => 18, 'peso < ' => 56, 'altura > ' => 1.5]]
        // Então [conditions => ['logic' => 'and', 'or']
      // ],
    // ]));

    // pr(Model::init('teste')->query(api: true));
    // pr(Model::init('produto')->query_id(2));
    // pr(Model::init('categoria')->query_id(6));
    // pr(Model::init('categoria')->query([
    //   'conditions' => [
    //     'comparison' => [
    //       'id = ' => 1, // Key e o operador de comparação (=, !=, <, >, <= e >=) separado por espaço
    //       'parent' => 1, // Se for igual, o sinal de = pode ser omitido
    //     ],
    //     'logic' => ['or'], // Operador lógico: or ou and
    //     // Para o campo logic é necessário que a quantidade de campos a serem informados\n
    //     // seja proporcional a quantidade de operadores lógicos com campos a serem associados
    //     // Se ['conditions' => ['idade > ' => 18, 'peso < ' => 56, 'altura > ' => 1.5]]
    //     // Então [conditions => ['logic' => 'and', 'or']
    //   ],
    // ], true));
    // pr(Model::init('categoria')->query([], true));
    // pr(Model::init('categoria')->delete(8, true));

    // $insert = Model::init('teste')->insert([
    //   'nome_teste' => 'Luiz Felipe',
    //   // 'descricao' => 'Testando salvar nome LZ'
    // ]);
    // pr($insert);

    // pr(Model::init('produto')->insert([
    //   'ativo' => true,
    //   'nome' => 'Camisa Oversized',
    //   'descricao' => 'Camisa Oversized, Camisa Oversized, Camisa Oversized',
    //   'marca' => 'Lucky Jeans',
    //   'preco' => 90.00,
    //   'peso' => 0.700,
    //   'largura' => 0.00,
    //   'altura' => 0.00,
    //   'comprimento' => 0.00
    // ], true));

    // pr(Model::init('categoria')->insert([
    //   'ativo' => true,
    //   'parent' => 6, // Se for Categoria pai recebe 0. Se for categoria filho recebe o id da categoria pai
    //   'tipo' => 'Estilo', // modelo, marca, estilo, tecido, etc...
    //   'nome' => 'Casual',
    // ], true));

    // pr(Model::init('produto_categoria')->insert([
    //   'produto_id' => 2,
    //   'categoria_id' => 5,
    // ], true));

    // pr(Model::init('produto')->create_table());
    // pr(Model::init('categoria')->create_table());
    // pr(Model::init('produto_categoria')->create_table());
    // pr(Model::init('teste')->create_table());

    // $connect = DataBase::connect();
    // pr($connect);

    die;
  }

  public function api()
  {
    header('Content-Type: application/json');
    die(json_encode(['status' => true]));
  }
}