<?php

// Rotas da main
$web->get('/', 'Home->index');
$web->get('/teste', 'Teste->index');
$web->get('/login', 'Login->index');
$web->get('/produtos', 'Produto->full_products');
$web->get('/produto/id/{id}', 'Produto->see_product');
$web->post('/entrar', function(){
  pr($_GET);
  pr($_POST);
  die;
});

// Rotas do admin
$web->get('/admin', 'AdminHome->index');
$web->get('/admin/produto/categorias', 'AdminProduto->categoria');
$web->post('/admin/produto/categorias', 'AdminProduto->categoria');
$web->get('/admin/produto/listar', 'AdminProduto->listar');
$web->get('/admin/produto/cadastrar', 'AdminProduto->cadastrar');
$web->post('/admin/produto/salvar', 'AdminProduto->salvar');

// Rotas de teste
$web->get('/teste', 'Teste->index');
$web->get('/teste/db/find', 'Teste->find');
$web->get('/teste/db/save', 'Teste->save');
$web->get('/teste/db/delete/{id}', 'Teste->delete');
$web->get('/api/v1/teste', fn()=> (new App\Web\Controllers\ApiTeste)->index());