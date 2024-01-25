<?php

$routes = [
  // Rotas da main
  ['get', '/', 'PageHome->index'],
  ['get', '/home', 'PageHome->index'],
  ['get', '/teste', 'PageTeste->index'],
  ['get', '/login', 'PageLogin->index'],
  ['post', '/entrar', 'PageLogin->entrar'],
  ['get', '/produtos', 'PageProduto->full_products'],
  ['get', '/produto/id/{id}', 'PageProduto->see_product'],
  // Rotas do admin
  ['get', '/admin', 'AdminHome->index'],
  ['get', '/admin/produto/listar', 'AdminProduto->listar'],
  ['get', '/admin/produto/cadastrar', 'AdminProduto->cadastrar'],
  // Rotas de teste
  ['get', '/teste', 'Teste->index'],
  ['get', '/teste/db/find', 'Teste->find'],
  ['get', '/teste/db/save', 'Teste->save'],
  ['get', '/teste/db/delete/{id}', 'Teste->delete'],

  ['get', '/api', function(){
    die('Welcome to API!');
  }],
];