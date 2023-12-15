<?php

namespace Src\Controller\Controllers\Admin;

use Src\Controller\AppAdmin;

class Home extends AppAdmin
{
  public function index()
  {
    parent::title('Admin Home');
    parent::admin('home');
    parent::content(['teste' => 'Testando...']);
  }
}