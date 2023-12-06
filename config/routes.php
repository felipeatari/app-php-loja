<?php

$routes = [
  // Rotas da main
  ['get', '/', 'PageHome->index'],
  ['get', '/home', 'PageHome->index'],
  ['get', '/teste', 'PageTeste->index'],
  ['get', '/login', 'PageLogin->index'],
  ['post', '/entrar', 'PageLogin->entrar'],
  ['get', '/produto/id/{id}', 'PageProduto->see_product'],
  // Rotas do admin
  ['get', '/admin', 'AdminHome->index'],
];

define('ROUTES', $routes);