<?php

define('ROUTES', [
  // Rotas da main
  ['get', '/', 'PageHome->index'],
  ['get', '/home', 'PageHome->index'],
  ['get', '/teste', 'PageTeste->index'],
  ['get', '/login', 'PageLogin->index'],
  ['post', '/entrar', 'PageLogin->entrar'],
  ['get', '/produto/id/{id}', 'PageProduto->see_product'],
  // Rotas do admin
  ['get', '/admin', 'AdminHome->index'],
  ['get', '/admin/produto/listar', 'AdminProduto->listar'],
  ['get', '/admin/produto/cadastrar', 'AdminProduto->cadastrar'],
  // Rotas de teste
  ['get', '/teste', 'PageTeste->index'],
  ['get', '/teste/db/find', 'PageTeste->find'],
  ['get', '/teste/db/save', 'PageTeste->save'],
  ['get', '/teste/db/delete/{id}', 'PageTeste->delete'],
]);