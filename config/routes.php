<?php

$routes = [
  // Rotas da main
  ['/', 'PageHome->index'],
  ['/home', 'PageHome->index'],
  ['/teste', 'PageTeste->index'],
  // Rotas do admin
];

define('ROUTES', $routes);