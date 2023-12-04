<?php

namespace App\Core;

use App\Controllers\PageErrorController;

class View
{
  private static string $title = '';
  private static string $page = '';
  private static string $admin = '';
  private static string $error = '';
  private static array $minify_css = [];
  private static array $minify_js = [];

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
   * Adiciona o(s) nome(s) do(s) arquivos(s) que será(ão) minificado(s)
   *
   * @param array|string $name_file
   * @param string $type_file
   *
   * @return void
   */
  public static function minify_add(array|string $name_file, string $type_file): void
  {
    if (is_array($name_file)) {
      if ($type_file === 'css') {
        self::$minify_css = array_merge($name_file, self::$minify_css);
      }
      elseif ($type_file === 'js') {
        self::$minify_js = array_merge($name_file, self::$minify_js);
      }
    }

    if (is_string($name_file)) {
      if ($type_file === 'css') {
        array_unshift(self::$minify_css, $name_file);
      }
      elseif ($type_file === 'js') {
        array_unshift(self::$minify_js, $name_file);
      }
    }
  }

  private static function minify_file(string $type_file): ?string
  {
    $minify_file = self::minify($type_file);

    if (is_null($minify_file)) {
      if (file_exists('storage/minify/main.' . $type_file)) {
        unlink('storage/minify/main.' . $type_file);
      }

      return null;
    }

    return URL . '/' . $minify_file;
  }

  private static function minify(string $type_file)
  {
    // Monta a minificação do CSS
    if ($type_file === 'css' and ! empty(self::$minify_css)) {

      $load_css = '';

      foreach (self::$minify_css as $file_css):

        if ($file_css === 'main') {
          $path_css = 'public/css/theme/' . $file_css;
        }
        elseif ($file_css === self::$page) {
          $path_css = 'public/css/page/' . $file_css;
        }
        elseif ($file_css === self::$admin) {
          $path_css = 'public/css/page/' . $file_css;
        }
        else {
          continue;
        }

        if (! file_exists($path_css . '.css')) {
          continue;
        }

        $load_css .= file_get_contents($path_css . '.css');
      endforeach;

      if (empty($load_css)) {
        return null;
      }

      $load_css = str_replace('{{url}}', URL, $load_css);
      $load_css = preg_replace('/\/\*(.*?)*\*\//', '', trim($load_css));
      $load_css = str_replace("\n", '', $load_css);
      $load_css = str_replace(' {', '{', $load_css);
      $load_css = str_replace('  ', '', $load_css);

      file_put_contents('storage/minify/main.css', $load_css);

      return 'storage/minify/main.css';
    }

    // Monta a minificação do JavaScript
    if ($type_file === 'js' and ! empty(self::$minify_js)) {

      $load_javascript = '';

      foreach (self::$minify_js as $file_js):

        if ($file_js === 'main') {
          $path_js = 'public/javascript/theme/' . $file_js . '.js';
        }
        elseif ($file_js === self::$page) {
          $path_js = 'public/javascript/page/' . $file_js . '.js';
        }
        elseif ($file_js === self::$admin) {
          $path_js = 'public/javascript/admin/' . $file_js . '.js';
        }
        else {
          continue;
        }

        if (! file_exists($path_js)) {
          continue;
        }

        $load_javascript .= file_get_contents($path_js);
      endforeach;

      if (empty($load_javascript)) {
        return null;
      }

      $load_javascript = str_replace('{{url}}', URL, $load_javascript);
      $load_javascript = preg_replace('/\/\*(.*?)*\*\//', '', trim($load_javascript));
      $load_javascript = str_replace("\n", '', $load_javascript);
      $load_javascript = str_replace('  ', '', $load_javascript);

      file_put_contents('storage/minify/main.js', $load_javascript);

      return 'storage/minify/main.js';
    }
  }

  /**
   * Método responsável por renderizar o HTML
   *
   * @param string $extension Extensão do arquivo da visão: .php ou .html
   * @param array $content Valores que serem substituídos dinamicamente
   *
   * @return string Página com os campos substituídos
   */
  public static function render(string $extension = '', array $content = []): ?string
  {
    if (self::$page) {
      $load_html = 'public/views/page/' . self::$page . '.' . $extension;
    }
    elseif (self::$admin) {
      $load_html = 'public/views/admin/' . self::$admin . '.' . $extension;
    }
    elseif (self::$error) {
      $load_html = 'public/views/error/' . self::$error . '.' . $extension;
    }
    else {
      return null;
    }

    if (! file_exists($load_html)) {
      return null;
    }

    if ($extension === 'php') {
      ob_start();
      require_once __DIR__ . '/../../' . $load_html;
      $file_html = ob_get_contents();
      ob_clean();
    }
    elseif ($extension === 'html') {
      $load_html = file_get_contents($load_html);

      // Carrega os dados dinâmicos 1
      $file_html = array_map(fn($item)=> '{{' . $item . '}}', array_keys($content));
      $file_html = str_replace($file_html, array_values($content), $load_html);

      // Carrega os dados dinâmicos 2
      $file_html = '{{'.implode('}}&{{', array_keys($content)).'}}';
      $file_html = str_replace(explode('&', $file_html), array_values($content), $load_html);
    }
    else {
      return null;
    }

    return $file_html;
  }

  /**
   * Método responsável por carregar todo o template
   *
   * @param string $content Recebe o conteúdo da página
   *
   * @return string
   */
  public static function template(?string $content = '')
  {
    if (empty($content)) {
      header('HTTP/2 404 Bad Request');
      header('Content-Type: text/plain');
      die;
    }

    if (isset($_SESSION['admin']) and $_SESSION['admin']) {
      $theme = 'admin';
      $view = self::$admin;
    }
    else {
      $theme = 'main';
      $view = self::$page;
    }

    self::minify_add([$theme, $view], 'css');
    self::minify_add([$theme, $view], 'js');

    $theme_title = self::$title;
    $theme_css = self::minify_file('css');
    $theme_js = self::minify_file('js');

    ob_start();
    require_once __DIR__ . '/../../public/theme/' . $theme . '.php';
    $template = ob_get_contents();
    ob_clean();

    // Renderiza em linha e sem espaço entre as tags
    $template = str_replace("\n", "", $template);
    $template = preg_replace('/\s+/', ' ', trim($template));
    $template = str_replace('> <', '><', $template);

    echo $template;
  }
}