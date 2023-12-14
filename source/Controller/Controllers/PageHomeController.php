<?php

namespace Source\Controller\Controllers;

use Source\View\AppView;

class PageHomeController
{
  public function index()
  {
    AppView::title('Pagina Home');
    AppView::page('home');

    return AppView::render();
  }
}