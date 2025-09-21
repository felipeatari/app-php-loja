<?php

namespace App\Controllers;

class ApiTesteController
{
  public function index()
  {
    $retorno = [
      'status' => 'success',
      'code' => 200,
      'message' => 'Welcome To My API Rest!',
      'data' => []
    ];

    return responseJson($retorno);
  }

  public function get()
  {
    $retorno = [
      'status' => 'success',
      'code' => 200,
      'message' => 'Rota GET',
      'data' => []
    ];

    return responseJson($retorno);
  }

  public function post()
  {
    $retorno = [
      'status' => 'success',
      'code' => 200,
      'message' => 'Rota POST',
      'data' => []
    ];

    return responseJson($retorno);
  }

  public function put()
  {
    $retorno = [
      'status' => 'success',
      'code' => 200,
      'message' => 'Rota PUT',
      'data' => []
    ];

    return responseJson($retorno);
  }

  public function delete()
  {
    $retorno = [
      'status' => 'success',
      'code' => 200,
      'message' => 'Rota DELETE',
      'data' => []
    ];

    return responseJson($retorno);
  }
}