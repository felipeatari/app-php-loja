<?php

define('ROUTES', [
  // Rotas da main
  ['get', '/', 'HomePage->index'],
  ['get', '/home', 'HomePage->index'],
  ['get', '/teste', 'TestePage->index'],
  ['get', '/login', 'LoginPage->index'],
  ['post', '/entrar', 'LoginPage->entrar'],
  ['get', '/produto/id/{id}', 'ProdutoPage->see_product'],
  // Rotas do admin
  ['get', '/admin', 'HomeAdmin->index'],
  ['get', '/admin/produto/listar', 'ProdutoAdmin->listar'],
  ['get', '/admin/produto/cadastrar', 'ProdutoAdmin->cadastrar'],
  // Rotas de teste
  ['get', '/teste', 'TestePage->index'],
  ['get', '/teste/db/find', 'TestePage->find'],
  ['get', '/teste/db/save', 'TestePage->save'],
  ['get', '/teste/db/delete/{id}', 'TestePage->delete'],
]);