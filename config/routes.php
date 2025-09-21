<?php

// Rotas da main
$router->get('/', 'Home->index');
$router->get('/teste', 'Teste->index');
$router->get('/login', 'Login->index');
$router->get('/produtos', 'Produto->full_products');
$router->get('/produto/id/{id}', 'Produto->see_product');
$router->post('/entrar', function(){
  pr($_GET);
  pr($_POST);
  die;
});

// Rotas do admin
$router->get('/admin', 'AdminHome->index');
$router->get('/admin/produto/categorias', 'AdminProduto->categoria');
$router->post('/admin/produto/categorias', 'AdminProduto->categoria');
$router->get('/admin/produto/listar', 'AdminProduto->listar');
$router->get('/admin/produto/cadastrar', 'AdminProduto->cadastrar');
$router->post('/admin/produto/salvar', 'AdminProduto->salvar');

// Rotas de teste
$router->get('/teste', 'Teste->index');
$router->get('/teste/db/find', 'Teste->find');
$router->get('/teste/db/save', 'Teste->save');
$router->get('/teste/db/delete/{id}', 'Teste->delete');
$router->get('/api/v1/teste', fn()=> (new App\Controllers\ApiTesteController)->index());

$router->get('api/teste', fn()=> (new App\Controllers\ApiTesteController)->get());
$router->post('api/teste', fn()=> (new App\Controllers\ApiTesteController)->post());
$router->put('api/teste', fn()=> (new App\Controllers\ApiTesteController)->put());
$router->delete('api/teste', fn()=> (new App\Controllers\ApiTesteController)->delete());

// $router->get('api/teste', 'ApiTeste->get');
// $router->post('api/teste', 'ApiTeste->post');
// $router->put('api/teste', 'ApiTeste->put');
// $router->delete('api/teste', 'ApiTeste->delete');