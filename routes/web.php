<?php

$routes = [
  // Rotas da main
  ['get', '/', 'MainHome->index'],
  ['get', '/teste', 'MainTeste->index'],
  ['get', '/login', 'MainLogin->index'],
  ['post', '/entrar', 'MainLogin->entrar'],
  ['get', '/produtos', 'MainProduto->full_products'],
  ['get', '/produto/id/{id}', 'MainProduto->see_product'],
  // Rotas do admin
  ['get', '/admin', 'AdminHome->index'],
  ['get', '/admin/produto/listar', 'AdminProduto->listar'],
  ['get', '/admin/produto/cadastrar', 'AdminProduto->cadastrar'],
  // Rotas de teste
  ['get', '/teste', 'Teste->index'],
  ['get', '/teste/db/find', 'Teste->find'],
  ['get', '/teste/db/save', 'Teste->save'],
  ['get', '/teste/db/delete/{id}', 'Teste->delete'],

  ['get', '/api/v1/teste', function(){
    return (new App\Web\Controllers\ApiTeste)->index();
  }],
];