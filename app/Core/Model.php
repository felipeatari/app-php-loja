<?php

namespace App\Core;

use App\Source\DataBase;
use Error;
use PDOException;

class Model
{
  private int|string $code_error = 0;
  private string $message_error = '';
  private string $table;
  private string $query = '';
  private int $count_condition = 0;
  protected array $fields = [];
  private int|bool $find_id = false;
  private array $conditions = [];
  private array $conditions_2 = [];

  public function __construct(string $entity)
  {
    $this->table = $entity;
  }

  public function code_error(): int|string
  {
    return $this->code_error;
  }

  public function message_error(): string
  {
    return $this->message_error;
  }

  public function find_id(int $id, array $inputs = []): Model
  {
    $fields = ' * ';

    if (! empty($inputs)) {
      $fields = ' ' . implode(', ', $inputs) . ' ';
    }

    $this->find_id = $id;
    $this->query = 'SELECT' . $fields . 'FROM ' . strtolower($this->table);

    return $this;
  }

  public function find(array $inputs = []): Model
  {
    $fields = ' * ';

    if (! empty($inputs)) {
      $fields = ' ' . implode(', ', $inputs) . ' ';
    }

    $this->query = 'SELECT' . $fields . 'FROM ' . strtolower($this->table);

    return $this;
  }

  public function condition(array $conditions = [], string $operator = ''): Model
  {
    $conditions_keys = array_keys($conditions);
    $conditions_values = array_values($conditions);

    if (isset($conditions_keys[0]) and isset($conditions_values[0])) {
      if (is_string($conditions_keys[0]) and is_array($conditions_values[0])) {
        $conditions_values = $conditions_values[0];

        $conditions_values = implode(', ', $conditions_values);

        $where = ' WHERE ' . $conditions_keys[0] . ' IN (' . $conditions_values . ')';

        $this->query .= $where;

        return $this;
      }
    }

    $this->count_condition++;

    $comparison_signal = function($signal = '') {
      if (mb_substr($signal, -3) === ' = ') return ' = ';
      elseif (mb_substr($signal, -4) === ' != ') return ' != ';
      elseif (mb_substr($signal, -3) === ' > ') return ' > ';
      elseif (mb_substr($signal, -3) === ' < ') return ' < ';
      elseif (mb_substr($signal, -4) === ' >= ') return ' >= ';
      elseif (mb_substr($signal, -4) === ' <= ') return ' <= ';
      else return ' = ';
    };

    $where = '';

    // pr($this->count_condition);
    // $conditions_keys_count[] = $conditions_keys;
    // foreach ($conditions_keys as $condition):
    //   // pr($i);
    //   pr($condition = $this->count_condition . '_' . $condition);
    //   // $i++;
    // endforeach;

    // pr(count($conditions_keys));die;

    // // pr(count($conditions_keys));
    // pr($conditions_keys[0]);
    // // $c = 1;
    // for ($i = 0; $i < count($conditions_keys); $i++):
    //   // $conditions_keys[$i] = $c . '_' . $conditions_keys[$i];
    //   pr($i);
    //   // $c++;
    // endfor;

    for ($i = 0; $i < count($conditions_keys); $i++):
      $signal = $comparison_signal($conditions_keys[$i]);
      $conditions_keys[$i] = str_replace($signal, '', $conditions_keys[$i]);

      $this->conditions[][$conditions_keys[$i]] = $conditions_values[$i];

      $where .= $conditions_keys[$i] . $signal . ':' . $conditions_keys[$i] . '_' . $this->count_condition;
    endfor;

    if ($this->count_condition === 1) {
      $where = ' WHERE ' . $where . ' ' . $operator . ' ';
    }

    if (! empty($operator) and $this->count_condition > 1) {
      $where .= ' ' . $operator . ' ';
    }

    $this->query .= $where;

    return $this;
  }

  public function order($field = 'id', $sort = 'DESC'): Model
  {
    $this->query .= ' ORDER BY ' . $field . ' ' . $sort;

    return $this;
  }

  public function limit(int $limit = 0): Model
  {
    $this->query .= ' LIMIT ' . $limit;

    return $this;
  }

  public function paginator(int $start = 0, int $length = 0): Model
  {
    $this->query .= ' LIMIT ' . $start . ', ' . $length;

    return $this;
  }

  public function fetch(): array|bool
  {
    try {
      $connect = DataBase::connect();

      if ($this->find_id) {
        $this->query .= ' WHERE id = :id';

        $stmt = $connect->prepare($this->query);
        $stmt->bindParam(':id', $this->find_id);
      }
      elseif (! empty($this->conditions)) {
        $stmt = $connect->prepare($this->query);

        $i = 1;
        foreach ($this->conditions as $condition):
          $key = array_keys($condition);
          $value = array_values($condition);

          $stmt->bindParam(':' . $key[0] . '_' . $i, $value[0]);
          $i++;
        endforeach;
      }
      else {
        $stmt = $connect->prepare($this->query);
      }

      $stmt->execute();

      DataBase::disconnect();

      if (! $stmt->rowCount()) {
        $this->code_error = 404;

        return false;
      }
    }
    catch (PDOException|Error $e) {
      $this->code_error = $e->getCode();
      $this->message_error = $e->getMessage();

      return false;
    }

    return $stmt->fetchAll();
  }

  public function save(): int|bool
  {
    try {
      $data = $this->fields;

      $data_keys = array_keys($data);
      $data_values = array_values($data);

      $data_insert_keys = '(' . implode(', ', $data_keys) . ')';
      $data_insert_values = array_map(fn($item)=> ':' . $item, $data_keys);
      $data_insert_values = '(' . implode(', ', $data_insert_values) . ')';

      $insert = "INSERT INTO " . $this->table . " $data_insert_keys VALUES $data_insert_values";

      $connect = DataBase::connect();
      $stmt = $connect->prepare($insert);

      foreach ($data_keys as $i => $key):
        $stmt->bindParam(':' . $key, $data_values[$i]);
      endforeach;

      $stmt->execute();

      DataBase::disconnect();

      if (! $stmt->rowCount()) {
        $this->code_error = 400;

        return false;
      }
    }
    catch (PDOException|Error $e) {
      $this->code_error = $e->getCode();
      $this->message_error = $e->getMessage();

      return false;
    }

    return $connect->lastInsertId();
  }

  public function update(int $id)
  {
    try {
      $data_keys = array_keys($this->fields);
      $data_values = array_values($this->fields);

      $keys_update = [];
      $data_keys_update = [];
      $data_values_update = [];

      for ($i = 0; $i < count($this->fields); $i++):
        if (empty($data_values[$i])) continue;
        $keys_update[] = $data_keys[$i] . ' = :' . $data_keys[$i];
        $data_values_update[] = $data_values[$i];
        $data_keys_update[] = $data_keys[$i];
      endfor;

      $keys_update = implode(', ', $keys_update);

      $connect = DataBase::connect();

      $update = "UPDATE " . $this->table . " SET $keys_update WHERE id = :id";

      $stmt = $connect->prepare($update);

      foreach ($data_keys_update as $i => $key):
        $stmt->bindParam(':' . $key, $data_values_update[$i]);
      endforeach;

      $stmt->bindParam(':id', $id);

      $stmt->execute();

      DataBase::disconnect();

      if (! $stmt->rowCount()) {
        $this->code_error = 400;

        return false;
      }
    }
    catch (PDOException|Error $e) {
      $this->code_error = $e->getCode();
      $this->message_error = $e->getMessage();

      return false;
    }

    return true;
  }

  public function delete(int $id): bool|array
  {
    try {
      $connect = DataBase::connect();

      DataBase::disconnect();

      $delete = "DELETE FROM " . $this->table . " WHERE id = :id";

      $stmt = $connect->prepare($delete);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      if (! $stmt->rowCount()) {
        $this->code_error = 400;

        return false;
      }
    }
    catch (PDOException|Error $e) {
      $this->code_error = $e->getCode();
      $this->message_error = $e->getMessage();

      return false;
    }

    return true;
  }
}