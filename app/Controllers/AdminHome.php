<?php

namespace App\Controllers;

use App\Components\Admin;

class AdminHome extends Admin
{
  public function index()
  {
    parent::title('Admin Home');
    parent::admin('home');
    parent::content(['teste' => 'Testando...']);
  }
}