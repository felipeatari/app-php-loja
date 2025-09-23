<?php

// Rotas da main
$router->get('/', 'HomeController@index');
// $router->get('/teste', 'TesteController@index');
// $router->get('/login', 'LoginController@index');
// $router->get('/produtos', 'ProdutoController@full_products');
// $router->get('/produto/id/{id}', 'ProdutoController@see_product');
// $router->post('/entrar', function(){
//   pr($_GET);
//   pr($_POST);
//   die;
// });

// Rotas do admin
// $router->get('/admin', 'AdminHomeController@index');
// $router->get('/admin/produto/categorias', 'AdminProdutoController@categoria');
// $router->post('/admin/produto/categorias', 'AdminProdutoController@categoria');
// $router->get('/admin/produto/listar', 'AdminProdutoController@listar');
// $router->get('/admin/produto/cadastrar', 'AdminProdutoController@cadastrar');
// $router->post('/admin/produto/salvar', 'AdminProdutoController@salvar');

// Rotas de teste
// $router->get('/teste', 'TesteController@index');
// $router->get('/teste/db/find', 'TesteController@find');
// $router->get('/teste/db/save', 'TesteController@save');
// $router->get('/teste/db/delete/{id}', 'TesteController@delete');
// $router->get('/api/v1/teste', fn()=> (new App\Controllers\ApiTesteController)->index());

$router->group('api/teste');
$router->get('/', 'ApiTesteController@get');
$router->post('/', 'ApiTesteController@post');
$router->put('/', 'ApiTesteController@put');
$router->delete('/', 'ApiTesteController@delete');
$router->endGroup();