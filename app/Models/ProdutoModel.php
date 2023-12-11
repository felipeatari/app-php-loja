<?php

namespace App\Models;

use App\Core\Model;

class ProdutoModel extends Model
{
  public function __construct()
  {
    parent::__construct('produto');

    $this->fields = [
      'ativo' => false,
      'nome' => '',
      'descricao' => '',
      'marca' => '',
      'preco' => 0.00,
      'peso' => 0.000,
      'largura' => 0.00,
      'altura' => 0.00,
      'comprimento' => 0.00,
    ];
  }

  public function ativo(bool $ativo)
  {
    $this->fields['ativo'] = $ativo;
  }

  public function nome(string $nome)
  {
    $this->fields['nome'] = $nome;
  }

  public function descricao(string $descricao)
  {
    $this->fields['descricao'] = $descricao;
  }

  public function marca(string $marca)
  {
    $this->fields['marca'] = $marca;
  }

  public function preco(float $preco)
  {
    $this->fields['preco'] = $preco;
  }

  public function peso(float $peso)
  {
    $this->fields['peso'] = $peso;
  }

  public function largura(float $largura)
  {
    $this->fields['largura'] = $largura;
  }

  public function altura(float $altura)
  {
    $this->fields['altura'] = $altura;
  }

  public function comprimento(float $comprimento)
  {
    $this->fields['comprimento'] = $comprimento;
  }
}