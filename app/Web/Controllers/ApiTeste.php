<?php

namespace App\Web\Controllers;

class ApiTeste
{
  public function index(): void
  {
    header('Content-Type: application/json');
    http_response_code(200);

    $retorno = [
      'status' => 'success',
      'code' => 200,
      'message' => 'Welcome To My API Rest!',
      'data' => []
    ];

    $retorno = json_encode($retorno);

    die($retorno);
  }
}