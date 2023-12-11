<?php

// Define o meta charset
define('CHARSET', 'UTF-8');

// Define a URL principal
define('URL', 'http://localhost:8888');

// Define as rotas do projeto
define('HOME', URL . '/');
define('SOBRE', URL . '/sobre');
define('CONTATO', URL . '/contato');
// define('APIBUSCAR', URL . '/api/data');

// Caminho para salvar a sessão
define('SESSION', __DIR__ . '/storage/temp/session');

// Conexão com o banco de dados online
// define('DB_USER', 'root');
// define('DB_PASSWD', 'root');
// define('DB_NAME', 'teste_braavo');
// define('DB_HOST', '10.0.0.30');
// define('DB_PORT', '3306');

// Conexão com o banco de dados local
define('DB_HOST', '172.19.0.1');
define('DB_PORT', '3307');
define('DB_NAME', 'db_teste');
define('DB_USER', 'root');
define('DB_PASSWD', 'root');

// Opções de configuração do banco de dados
define('DB_OPTIONS', [
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
  PDO::ATTR_CASE => PDO::CASE_NATURAL
]);