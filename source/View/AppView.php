<?php

namespace Src\View;

class AppView
{
  private static string $title = '';
  private static string $page = '';
  private static string $admin = '';
  private static string $error = '';

  /**
   * Método responsável por carregar o título da página atual
   *
   * @param string $title Título da página atual
   *
   * @return void
   */
  public static function title(string $title = null): void
  {
    self::$title = $title;
  }

  public static function page(string $page = ''): void
  {
    self::$page = $page;
  }

  public static function admin(string $admin = ''): void
  {
    self::$admin = $admin;
  }

  public static function error(string $error = ''): void
  {
    self::$error = $error;
  }

  /**
   * Carrega arquivos PHP
   *
   * @param string $path_file Caminho do arquivos
   * @param array $vars_dynamic Dados que serão carregados dinamicamente
   *
   * @return string
   */
  private static function load_file_php(string $path_file, array $vars_dynamic = []): string
  {
    if (! empty($vars_dynamic)) extract($vars_dynamic);

    ob_start();
    require_once __DIR__ . '/../../' . $path_file;
    $load_file = ob_get_contents();
    ob_clean();

    return $load_file;
  }

  /**
   * Método responsável por renderizar o HTML
   *
   * @param string $extension Extensão do arquivo da visão: .php ou .html
   * @param array $vars_dynamic Dados que serão carregados dinamicamente
   *
   * @return string Página com os campos substituídos
   */
  public static function render(array $vars_dynamic = []): ?string
  {
    if (self::$page) {
      $view = 'public/views/page/' . self::$page . '.php';
    }
    elseif (self::$admin) {
      $view = 'public/views/admin/' . self::$admin . '.php';
    }
    elseif (self::$error) {
      $view = 'public/views/error/' . self::$error . '.php';
    }
    else {
      return null;
    }

    if (! file_exists($view)) return null;

    return self::load_file_php($view, $vars_dynamic);
  }

  /**
   * Método responsável por carregar todo o template
   *
   * @param string $content Recebe o conteúdo da página
   *
   * @return string
   */
  public static function template(string $theme = 'main', ?string $content = '')
  {
    if ($theme === 'admin') {
      $view = self::$admin;
    }
    else {
      $view = self::$page;
    }

    $theme_css = URL . '/public/css/theme/' . $theme . '.css';
    $theme_js = URL . '/public/javascript/theme/' . $theme . '.js';
    $view_css = URL . '/public/css/page/' . $view . '.css';
    $view_js = URL . '/public/javascript/page/' . $view . '.js';

    $theme = 'public/theme/' . $theme . '.php';

    if (! file_exists($theme)) return null;

    $template = self::load_file_php($theme, [
      'theme_title' => self::$title,
      'theme_css' => $theme_css,
      'theme_js' => $theme_js,
      'view_css' => $view_css,
      'view_js' => $view_js,
      'content' => $content
    ]);

    // Renderiza em linha e sem espaço entre as tags
    $template = str_replace("\n", "", $template);
    $template = preg_replace('/\s+/', ' ', trim($template));
    $template = str_replace('> <', '><', $template);

    echo $template;
  }
}