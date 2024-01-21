<?php

namespace Src\Components;

use Src\App\View;

abstract class Admin
{
  public function __construct()
  {
    // if (! isset($_SESSION['admin'])) {
      // header('Location: ' . URL . '/login');
    // }
  }

  protected function title(string $title)
  {
    View::title($title);
  }

  protected function admin(string $admin)
  {
    View::admin($admin);
  }

  protected function content(array $vars_dynamic = [])
  {
    $content = View::render($vars_dynamic);
    View::template('admin', $content);die;
  }
}