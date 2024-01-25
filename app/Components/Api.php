<?php

namespace App\Components;

use App\Components\Controller;

class Api
{
  public static function get(string $route, mixed $action)
  {
    $end = (new Controller([], true))->get($route, $action)->dispatcher();

    die($end);
  }
}