<?php

namespace Src\Controller\Controllers\Admin;

use Src\Controller\Admin;

class AdminHomeController extends Admin
{
  public function index()
  {
    parent::title('Admin Home');
    parent::admin('home');
    parent::content(['teste' => 'Testando...']);
  }
}