<?php

namespace App\Source;

use App\Core\View;

abstract class Admin
{
  public function __construct()
  {
    if (! isset($_SESSION['admin'])) {
      header('Location: ' . URL . '/login');
    }
  }

  public function title(string $title)
  {
    View::title($title);
  }

  public function admin(string $admin)
  {
    View::admin($admin);
  }

  public function content(array $vars_dynamic = [])
  {
    $content = View::render($vars_dynamic);
    View::template('admin', $content);die;
  }
}