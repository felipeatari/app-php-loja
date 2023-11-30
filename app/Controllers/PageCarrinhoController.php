<?php

namespace App\Controllers;

class PageCarrinhoController
{
  public function index()
  {
    return '<h1>Página inicial do Carrinho</h1>';
  }

  public function endereco()
  {
    return '<h1>Página do Carrinho que valida o endereço</h1>';
  }

  public function pagamento()
  {
    return '<h1>Página do Carrinho que valida o pagamento</h1>';
  }

  public function finaliza()
  {
    return '<h1>Página que finaliza o carrinho</h1>';
  }
}