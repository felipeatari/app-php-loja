<?php

namespace App\Web\Controllers;

use App\Web\Admin;

class AdminHome extends Admin
{
  public function index()
  {
    parent::title('Admin Home');
    parent::admin('admin-home');
    parent::content(['teste' => 'Testando...']);
  }
}