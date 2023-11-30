<?php

namespace App\Core;

use App\Source\DataBase;
use App\Source\Response;
use App\Source\Singleton;
use PDOException;

class Model extends Singleton
{
  private static $table;
  private static $classe;

  public static function init(string $model): mixed
  {
    if (preg_match('/\_/', $model)) {
      self::$classe = str_replace(' ', '', ucwords(str_replace('_', ' ', $model)));
    }
    else {
      self::$classe = ucfirst($model);
    }

    self::$classe = 'App\\Models\\' . self::$classe . 'Model';

    if (! class_exists(self::$classe)) {
      die('Model ' . ucfirst($model) . ' não existe');
    }

    self::$table = $model;

    return self::$classe::new();
  }

  public function create_table()
  {
    $message = '';

    try {
      $connect = DataBase::connect();

      if (DataBase::db_error()) {
        $message = DataBase::db_msg_error();
      }

      $estrutura_tabela = call_user_func(self::$classe . '::table_structure');

      $sql = 'CREATE TABLE ' . self::$table . ' (' . implode(', ', $estrutura_tabela) . ');';

      $stmt = $connect->prepare($sql);

      $stmt->execute();

      $message = 'Tabela ' . self::$table . ' criada com sucesso';
    }
    catch (PDOException $e) {
      $message = $e->getMessage();

      if ($e->getCode() === '42S01') {
        $message = 'Tabela ' . self::$table . ' já existe';
      }
    }

    DataBase::disconnect();

    die($message);
  }

  public function query(array $params = [], bool $api = false): bool|array
  {
    try {
      if (isset($params['inputs']) and is_array($params['inputs'] and ! empty($params['inputs']))) {
        $inputs = implode(', ', $params['inputs']);
      }
      else {
        $inputs = '*';
      }

      if (isset($params['inner_join']) and is_array($params['inner_join']) and ! empty($params['inner_join'])) {
        $join = $params['inner_join']['join'] ?? '';
        $type_join = $params['inner_join']['type_join'] ?? '';
        $primary_key = $params['inner_join']['primary_key'] ?? '';
        $foreign_key = $params['inner_join']['foreign_key'] ?? '';
        $join_id = $params['inner_join']['join_id'] ?? '';

        if (empty($join)) {
          return (! $api) ? false : Response::error(400, 'Campo "join" não informado ou o valor dele é inválido');
        }

        if (empty($type_join)) {
          return (! $api) ? false : Response::error(400, 'Campo "type_join" não informado ou o valor dele é inválido');
        }

        if (empty($primary_key)) {
          return (! $api) ? false : Response::error(400, 'Campo "primary_key" não informado ou o valor dele é inválido');
        }

        if (empty($foreign_key)) {
          return (! $api) ? false : Response::error(400, 'Campo "foreign_key" não informado ou o valor dele é inválido');
        }

        if (isset($params['inner_join']['fields']) and ! empty($params['inner_join']['fields'])) {
          $inputs = '';
          foreach ($params['inner_join']['fields'] as $field):
            $inputs .= $field . ' ,';
          endforeach;

          $inputs = rtrim($inputs, ', ');
        }

        $type_join = strtolower($type_join);

        if (! empty($join_id)) {
          $inner_join = " $type_join JOIN $join ON " . self::$table . ".$primary_key = $join.$foreign_key WHERE $primary_key = $join_id";
        }
        else {
          $inner_join = " $type_join JOIN $join ON " . self::$table . ".$primary_key = $join.$foreign_key";
        }
      }

      if (isset($params['conditions']) and is_array($params['conditions']) and ! empty($params['conditions'])) {
        $comparisons = $params['conditions']['comparisons'] ?? [];
        $logical_operators = $params['conditions']['logical_operators'] ?? [];

        if (empty($comparisons) and empty($logical_operators)) {
          return (! $api) ? false : Response::error(400, 'Campo "comparison" e/ou "logic" não existe(m) ou inválido(s)');
        }

        if (! empty($comparisons) and count($logical_operators) === 1) {
          return (! $api) ? false : Response::error(400, 'Para utilizar o campo "logic" é necessário passar mais campo para comparação');
        }

        if (empty($comparisons) and count($logical_operators) > 1) {
          return (! $api) ? false : Response::error(400, 'Para utilizar mais de um campo comparação é necessário informar o campo "logic"');
        }

        if (! empty($comparisons) and count($logical_operators) > 1) {

          foreach ($logical_operators as $validate):
            if ($validate != 'and' and $validate != 'or') {
              return (! $api) ? false : Response::error(400, 'Informe um dos operadores lógicos "and" ou "or"');
            }
          endforeach;
        }

        $conditions = '';

        $various_searches_key = array_keys($comparisons);
        $various_searches_key = $various_searches_key[0] ?? '';

        if (! empty($various_searches_key)) {
          $various_searches_values = $comparisons[ $various_searches_key ];
        }

        if (isset($various_searches_values) and is_array($various_searches_values) and count($various_searches_values) >= 1) {
          $various_searches_values = implode(', ', $comparisons[ $various_searches_key ]);
          $conditions = ' WHERE ' . $various_searches_key . ' IN (' . $various_searches_values . ')';
        }

        if (empty($conditions)) {
          $comparison_signal = function($signal = '') {
            if (mb_substr($signal, -3) == ' = ') {
              return ' = ';
            }
            elseif (mb_substr($signal, -4) == ' != ') {
              return ' != ';
            }
            elseif (mb_substr($signal, -3) == ' > ') {
              return ' > ';
            }
            elseif (mb_substr($signal, -3) == ' < ') {
              return ' < ';
            }
            elseif (mb_substr($signal, -4) == ' >= ') {
              return ' >= ';
            }
            elseif (mb_substr($signal, -4) == ' <= ') {
              return ' <= ';
            }
            else {
              return ' = ';
            }
          };

          $keys = array_keys($comparisons);
          $values = array_values($comparisons);

          $signal = '';
          $signal_all = [];

          for ($i = 0; $i < count($comparisons); $i++):
            $signal = $comparison_signal($keys[$i]);
            $signal_all[] = $signal;

            $logical_operator = $logical_operators[$i] ?? null;

            $conditions .= rtrim($keys[$i], $signal) . $signal . ":" . rtrim($keys[$i], $signal) . " " . $logical_operator . " ";
          endfor;

          for ($i = 0; $i < count($signal_all); $i++):
            $signal = $signal_all[$i];

            $keys = array_map(function($key) use($signal) {
              return rtrim($key, " $signal ");
            }, $keys);
          endfor;

          $conditions = " WHERE " . rtrim($conditions, " ");
        }

      }

      if (isset($params['pagination']) and ! is_array($params['pagination'])) {
        return (! $api) ? false : Response::error(400, 'O campo "pagination" deve ser um array');
      }
      elseif (isset($params['pagination']) and empty($params['pagination'])) {
        return (! $api) ? false : Response::error(400, 'O campo "pagination" não pode ser vazio');
      }
      elseif (isset($params['pagination'])) {
        if (! isset($params['pagination']['start']) or empty($params['pagination']['start'])) {
          return (! $api) ? false : Response::error(400, 'Necessário informar ou preencher o campo "start"');
        }

        if (! isset($params['pagination']['length']) or empty($params['pagination']['length'])) {
          return (! $api) ? false : Response::error(400, 'Necessário informar ou preencher o campo "length"');
        }

        $pagination = " LIMIT " . $params['pagination']['start'] . ", " . $params['pagination']['length'];
      }

      $order_by = ' ORDER BY id ';
      if (isset($params['order']) and $params['order'] != 'id') {
        $order_by = ' ORDER BY ' . $params['order'] . ' ';
      }

      $order = 'DESC ';
      if (isset($params['sort'])) {
        if ($params['sort'] == 'asc') {
          $order = 'ASC ';
        }
        elseif ($params['sort'] == 'desc') {
          $order = 'DESC ';
        }
        else {
          return (! $api) ? false : Response::error(400, 'O parâmetro "sort" deve receber os seguintes valores: "asc" ou "desc"');
        }
      }

      $search = "SELECT $inputs FROM " . strtolower(self::$table);

      if (isset($inner_join)) {
        $search .= $inner_join;
      }
      elseif (isset($pagination)) {
        $search .= $pagination;
      }
      else {
        if (isset($conditions)) {
          $search .= $conditions;
        }

        $search .= $order_by . $order;
      }

      if (isset($params['limit']) and ! empty($params['limit'])) {
        $search .= 'LIMIT ' . $params['limit'];
      }

      $connect = DataBase::connect();

      if (DataBase::db_error()) {
        return (! $api) ? false : Response::error(DataBase::db_cod_error(), DataBase::db_msg_error());
      }

      $stmt = $connect->prepare($search);

      // pr($keys);

      if (isset($keys)) {
        if (count((array) $keys) > 1 and count((array) $values) > 1) {
          foreach ($keys as $i => $key):
            $stmt->bindParam(':' . $key, $values[$i]);
          endforeach;
        }
        else {
          $stmt->bindParam(':' . $keys[0], $values[0]);
        }
      }

      $stmt->execute();

      DataBase::disconnect();

      if (! $stmt->rowCount()) {
        return (! $api) ? false : Response::error(404, 'Busca não encontrada');
      }

      return (! $api) ? $stmt->fetchAll() : Response::success(200, $stmt->rowCount(), $stmt->fetchAll());
    }
    catch (PDOException $e) {
      return (! $api) ? false : Response::error($e->getCode(), $e->getMessage());
    }
  }

  public function query_id(int $id = null, bool $api = false): bool|array
  {
    try {
      if (is_null($id)) {
        return (! $api) ? false : Response::error(400, 'Nenhum ID informado');
      }

      if (! is_numeric($id) or ! is_integer($id)) {
        return (! $api) ? false : Response::error(400, 'O ID deve ser um número inteiro');
      }

      $connect = DataBase::connect();

      if (DataBase::db_error()) {
        return (! $api) ? false : Response::error(DataBase::db_cod_error(), DataBase::db_msg_error());
      }

      $search = "SELECT * FROM " . strtolower(self::$table) . " WHERE id = :id";

      $stmt = $connect->prepare($search);

      $stmt->bindParam(':id' , $id);

      $stmt->execute();

      DataBase::disconnect();

      if (! $stmt->rowCount()) {
        return (! $api) ? false : Response::error(404, 'Erro ao buscar registro pelo ID ' . $id);
      }

      return (! $api) ? $stmt->fetch() : Response::success(200, $stmt->rowCount(), $stmt->fetch());
    }
    catch (PDOException $e) {
      return (! $api) ? false : Response::error((int) $e->getCode(), $e->getMessage());
    }
  }

  public function insert(array $data = [], bool $api = false): bool|array
  {
    try {
      if (empty($data)) {
        return (! $api) ? false : Response::error(400, 'Informe os dados');
      }

      $keys = array_keys($data);
      $values = array_values($data);

      $db_keys_fixed = '(';
      $db_keys_dynamic = '(';

      for ($i = 0; $i < count($data); $i++):
        $db_keys_fixed .= $keys[$i] . ', ';
        $db_keys_dynamic .= ':' . $keys[$i] . ', ';
      endfor;

      $db_keys_fixed = rtrim($db_keys_fixed, ', ');
      $db_keys_fixed .= ')';

      $db_keys_dynamic = rtrim($db_keys_dynamic, ', ');
      $db_keys_dynamic .= ')';

      $insert = "INSERT INTO " . self::$table . " $db_keys_fixed VALUES $db_keys_dynamic";

      $connect = DataBase::connect();

      if (DataBase::db_error()) {
        return (! $api) ? false : Response::error(DataBase::db_cod_error(), DataBase::db_msg_error());
      }

      $stmt = $connect->prepare($insert);

      foreach ($keys as $i => $key):
        $stmt->bindParam(':' . $key, $values[$i]);
      endforeach;

      $stmt->execute();

      DataBase::disconnect();

      if (! $stmt->rowCount()) {
        return (! $api) ? false : Response::error(400, 'Erro ao adicionar registro');
      }

      return (! $api) ? true : Response::success(201, $stmt->rowCount(), ['id' => $connect->lastInsertId(), 'dados_adicionados' => $data]);
    }
    catch (PDOException $e) {
      return (! $api) ? false : Response::error($e->getCode(), $e->getMessage());
    }
  }

  public function update($data = [], bool $api = false): bool|array
  {
    try {
      if (! isset($data['id']) or empty($data['id'])) {
        return (! $api) ? false : Response::error(400, 'Parâmetro "id" não informado ou vazio');
      }

      if (! is_numeric($data['id']) or ! is_integer($data['id'])) {
        return (! $api) ? false : Response::error(400, 'O "id" deve ser um número inteiro');
      }

      if (! isset($data['data']) or empty($data['data'])) {
        return (! $api) ? false : Response::error(400, 'Parâmetro "data" não informado ou vazio');
      }

      $keys = array_keys($data['data']);
      $values = array_values($data['data']);

      $db_keys_fixed_and_dynamic = '';

      for ($i = 0; $i < count($data['data']); $i++):
        $db_keys_fixed_and_dynamic .= $keys[$i] . ' = ';
        $db_keys_fixed_and_dynamic .= ':' . $keys[$i] . ', ';
      endfor;

      $db_keys_fixed_and_dynamic = rtrim($db_keys_fixed_and_dynamic, ', ');

      $connect = DataBase::connect();

      if (DataBase::db_error()) {
        return (! $api) ? false : Response::error(DataBase::db_cod_error(), DataBase::db_msg_error());
      }

      $update = "UPDATE " . self::$table . " SET $db_keys_fixed_and_dynamic WHERE id = :id";

      $stmt = $connect->prepare($update);

      if (count($keys) > 1 and count($values) > 1) {
        foreach ($keys as $i => $key):
          $stmt->bindParam(':' . $key, $values[$i]);
        endforeach;
        $stmt->bindParam(':id', $data['id']);
      }
      else {
        $stmt->bindParam(':' . $keys[0], $values[0]);
        $stmt->bindParam(':id', $data['id']);
      }

      $stmt->execute();

      DataBase::disconnect();

      if (! $stmt->rowCount()) {
        return (! $api) ? false : Response::error(400, 'Erro ao editar registro');
      }

      return (! $api) ? true : Response::success(201, $stmt->rowCount(), ['id' => $data['id'], 'dados_editados' => $data['data']]);
    }
    catch (PDOException $e) {
      return (! $api) ? false : Response::error($e->getCode(), $e->getMessage());
    }
  }

  public function delete(int $id = null, bool $api = false): bool|array
  {
    try {
      if (is_null($id)) {
        return (! $api) ? false : Response::error(400, 'Nenhum ID informado');
      }

      if (! is_numeric($id) or ! is_integer($id)) {
        return (! $api) ? false : Response::error(400, 'O "id" deve ser um número inteiro');
      }

      $connect = DataBase::connect();

      DataBase::disconnect();

      if (DataBase::db_error()) {
        return (! $api) ? false : Response::error(DataBase::db_cod_error(), DataBase::db_msg_error());
      }

      $delete = "DELETE FROM " . self::$table . " WHERE id = :id";

      $stmt = $connect->prepare($delete);

      $stmt->bindParam(':id', $id);

      $stmt->execute();

      if (! $stmt->rowCount()) {
        return (! $api) ? false : Response::error(400, 'O registro já foi deletado ou não existe');
      }

      return (! $api) ? true : Response::success(201, $stmt->rowCount(), ['id' => $id, 'msg' => 'Registro "' . $id . '" foi deletado']);
    }
    catch (PDOException $e) {
      return (! $api) ? false : Response::error($e->getCode(), $e->getMessage());
    }
  }
}