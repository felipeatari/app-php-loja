<?php

namespace App\Components;

class Session
{
  /**
   * Inicia uma sessão caso não exista
   */
  public static function start(): void
  {
    if (! session_id()) {
      session_save_path(SESSION);
      session_start();
    }
  }

  public static function all(): ?object
  {
    return (object) $_SESSION;
  }

  public static function one($key): ?string
  {
    return $_SESSION[$key];
  }

  public static function set(string $key, $value): void
  {
    $_SESSION[$key] = (is_array($value) ? (object) $value : $value);
  }

  public static function unset(string $key = null): void
  {
    if ($key) {
      unset($_SESSION[$key]);
    }
    else{
      session_unset();
    }
  }

  public static function has(string $key): bool
  {
    return isset($_SESSION[$key]);
  }

  public static function regeneration_id(): void
  {
    session_regenerate_id(true);
  }

  public static function destroy(): void
  {
    session_destroy();
  }
}