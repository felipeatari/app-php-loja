<?php

namespace Src\Controller\Controllers\Page;

use Src\View\AppView;

class PageHomeController
{
  public function index()
  {
    AppView::title('Pagina Home');
    AppView::page('home');

    return AppView::render();
  }
}