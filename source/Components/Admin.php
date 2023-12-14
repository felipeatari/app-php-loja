<?php

namespace Source\Components;

use Source\View\AppView;

abstract class Admin
{
  public function __construct()
  {
    // if (! isset($_SESSION['admin'])) {
    //   header('Location: ' . URL . '/login');
    // }
  }

  public function title(string $title)
  {
    AppView::title($title);
  }

  public function admin(string $admin)
  {
    AppView::admin($admin);
  }

  public function content(array $vars_dynamic = [])
  {
    $content = AppView::render($vars_dynamic);
    AppView::template('admin', $content);die;
  }
}