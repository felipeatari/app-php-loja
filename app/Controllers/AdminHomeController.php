<?php

namespace App\Controllers;

use App\Source\Admin;

class AdminHomeController extends Admin
{
  public function index()
  {
    parent::title('Admin Home');
    parent::admin('home');
    parent::content(['teste' => 'Testando...']);
  }
}