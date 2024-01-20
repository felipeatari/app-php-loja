<?php

namespace Src\Components;

class Log
{
  public static function create($name, $log)
  {
    file_put_contents('storage/temp/logs/' . $name . '.txt', $log);
  }
}