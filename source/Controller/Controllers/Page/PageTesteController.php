<?php

namespace Src\Controller\Controllers\Page;

use Src\View\AppView;
use Src\Model\Models\TesteModel;
use Src\Model\Models\ProdutoModel;
use Src\Model\Models\CategoriaModel;

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
    $model = new ProdutoModel();
    // $model = new CategoriaModel();

    pr($model->find_id(2, simple: true));
    if ($model->error) {
      pr($model->code_error);
      pr($model->message_error);
      die;
    }
    die;
    pr($model->find()->fetch());die;

    $find = $model->find()
    // $find = $model->find(['id', 'nome']) // Traz os campos ID e nome
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

    if ($model->error) {
      pr($model->code_error);
      pr($model->message_error);
      die;
    }

    // pr($find);

    foreach ($find as $object):
      pr('ID: ' . $object->id);
      pr('Nome: ' . $object->nome);
      pr('<hr>');
    endforeach;

    die;
  }

  public function find()
  {
    pr((new ProdutoModel())
    ->query_join([
      'inputs' => [
        // 'produto' => ['nome', 'categoria_id'],
        'categoria' => ['nome'],
      ],
      'limit' => 2
    ])
    ->joins(['categoria' => 'categoria_id'])
  );die;
    $produtos = new ProdutoModel();
    // $categoria = new CategoriaModel();

    $find_produtos = $produtos->find()
    // ->limit(3)
    // ->condition([])
    // ->fetch(true);

    // $categorias = $categoria->find()
    // ->condition(['parent_id' => 16])
    // ->limit(3)
    ->fetch(true);

    // $produto->get_categoria(12);

    $data = [];

    foreach ($find_produtos as $produto):
      pr($produto);
      // $categoria_id = $produto->categoria_id;

      // if (! $categoria_id) continue;

      // $categoria = $produtos->get_categoria($categoria_id);

      // $data[] = [
      //   'categoria' => $categoria,
      //   'produto' => $produto,
      // ];
    endforeach;
    die;

    foreach ($data as $row):
      pr($row['categoria']->nome);
      pr($row['produto']->nome);
      pr('<hr>');
    endforeach;

    // pr($data);
    die;
    // pr($categorias);

    // foreach ($produtos['produto'] as $object):
    //   pr($object);
      // pr('ID: ' . $object->id);
      // pr('Nome: ' . $object->nome);
      // pr('<hr>');
    // endforeach;

    die;
  }

  public function save(int $id = 0)
  {
    $model = new CategoriaModel;
    $model->field('nome', 'mauricinho');
    $model->field('parent_id', 18);
    $categoria_id = $model->save();

    $model = new ProdutoModel;
    $model->field('nome', 'Camisa Social');
    // $model->field('categoria_id', $categoria_id);
    // $model->categoria_id = 12;

    // pr($model->nome = 'Felipe');

    // $model = new CategoriaModel;
    // $model->nome('mauricinho');
    // $model->parent_id(18);

    if ($id > 0) {
      pr($model->update($id));
    }
    else {
      pr($model->save());
    }

    if ($model->error) {
      pr([$model->code_error, $model->message_error]);
    };

    die;
  }

  public function delete(int $id)
  {
    $model = new ProdutoModel;
    // $model = new CategoriaModel;

    pr($model->delete($id));

    if ($model->error) {
      pr([$model->code_error, $model->message_error]);die;
    };
    die;
  }
}