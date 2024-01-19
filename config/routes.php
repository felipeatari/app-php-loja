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
  ['get', '/admin', 'HomeAdmin->index'],
  ['get', '/admin/produto/listar', 'ProdutoAdmin->listar'],
  ['get', '/admin/produto/cadastrar', 'ProdutoAdmin->cadastrar'],
  // Rotas de teste
  ['get', '/teste', 'Teste->index'],
  ['get', '/teste/db/find', 'Teste->find'],
  ['get', '/teste/db/save', 'Teste->save'],
  ['get', '/teste/db/delete/{id}', 'Teste->delete'],
]);