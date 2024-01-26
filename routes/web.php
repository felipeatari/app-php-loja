<?php

// Rotas da main
$web->get('/', 'MainHome->index');
$web->get('/teste', 'MainTeste->index');
$web->get('/login', 'MainLogin->index');
$web->get('/produtos', 'MainProduto->full_products');
$web->get('/produto/id/{id}', 'MainProduto->see_product');
$web->post('/entrar', function(){
  pr($_GET);
  pr($_POST);
  die;
});

// Rotas do admin
$web->get('/admin', 'AdminHome->index');
$web->get('/admin/produto/listar', 'AdminProduto->listar');
$web->get('/admin/produto/cadastrar', 'AdminProduto->cadastrar');

// Rotas de teste
$web->get('/teste', 'Teste->index');
$web->get('/teste/db/find', 'Teste->find');
$web->get('/teste/db/save', 'Teste->save');
$web->get('/teste/db/delete/{id}', 'Teste->delete');
$web->get('/api/v1/teste', function(){
  return (new App\Web\Controllers\ApiTeste)->index();
});