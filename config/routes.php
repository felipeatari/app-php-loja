<?php

// Atribui todas as rotas
$controller->get('/', 'PageHome@index');
$controller->get('/home', 'PageHome@index');
$controller->get('/sobre', 'PageSobre@index');

$controller->get('/rastreio', 'PageRastreio@index');
$controller->get('/login', 'PageLogin@index');
$controller->get('/carrinho', 'PageCarrinho@index');

$controller->get('/testes', 'PageTeste@index');

$controller->get('/admin', 'AdminHome@index');

$api = new App\Controllers\PageTesteController;
$controller->get('/testes/teste', fn()=> $api->teste());