<?php

namespace App\Core;

use App\Controllers\PageErrorController;

class View
{
  private static string $title;
  private static string $page;
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

  /**
   * Método responsável por carregar o nome da página atual
   *
   * @param string $page Nome da página atual
   *
   * @return void
   */
  public static function page(string $page = null): void
  {
    self::$page = $page;
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
      if (file_exists('storage/temp/minify/main.' . $type_file)) {
        unlink('storage/temp/minify/main.' . $type_file);
      }

      return null;
    }

    return URL . '/' . $minify_file;
  }

  private static function minify(string $type_file)
  {
    // Monta a minificação do CSS
    if ($type_file === 'css' and ! empty(self::$minify_css)) {

      $file_css = '';

      foreach (self::$minify_css as $css):

        if ($css === 'reset' or $css === 'main') {
          $css_path = 'theme/' . $css;
        }
        elseif ($css === self::$page) {
          $css_path = 'pages/' . $css;
        }
        else {
          continue;
        }

        if (! file_exists('public/css/' . $css_path . '.css')) {
          continue;
        }

        $file_css .= file_get_contents('public/css/' . $css_path . '.css');
      endforeach;

      $file_css = str_replace('{{url}}', URL, $file_css);
      $file_css = preg_replace('/\/\*(.*?)*\*\//', '', trim($file_css));
      $file_css = str_replace("\n", '', $file_css);
      $file_css = str_replace(' {', '{', $file_css);
      $file_css = str_replace('  ', '', $file_css);

      if (empty($file_css)) {
        return null;
      }

      file_put_contents('storage/temp/minify/main.css', $file_css);

      return 'storage/temp/minify/main.css';
    }

    // Monta a minificação do JavaScript
    if ($type_file === 'js' and ! empty(self::$minify_js)) {

      $file_js = '';

      foreach (self::$minify_js as $js):

        if ($js === 'main') {
          $js = 'theme/' . $js;
        }
        elseif ($js === self::$page) {
          $js = 'pages/' . $js;
        }
        else {
          continue;
        }

        if (! file_exists('public/javascript/' . $js . '.js')) {
          continue;
        }

        $file_js .= file_get_contents('public/javascript/' . $js . '.js');
      endforeach;

      $file_js = str_replace('{{url}}', URL, $file_js);
      $file_js = preg_replace('/\/\*(.*?)*\*\//', '', trim($file_js));
      $file_js = str_replace("\n", '', $file_js);
      $file_js = str_replace('  ', '', $file_js);

      if (empty($file_js)) {
        return null;
      }

      file_put_contents('storage/temp/minify/main.js', $file_js);

      return 'storage/temp/minify/main.js';
    }
  }

  /**
   * Método responsável por renderizar o HTML
   *
   * @param string $html ome da página
   * @param array $content Valores que serem substituídos dinamicamente
   * @return string Página com os campos substituídos
   */
  public static function render(string $html, array $content = []): string
  {
    $load_html = 'public/views/pages/' . $html . '.html';

    // Carrega a página HTML
    if (file_exists($load_html)) {
      $load_html = file_get_contents($load_html);
    }
    else {
      $load_html = PageErrorController::error(404, 'Arquivo não encontrado');
    }

    // Carrega os dados dinâmicos 1
    // $file_html = array_map(fn($item)=> '{{' . $item . '}}', array_keys($content));
    // $file_html = str_replace($file_html, array_values($content), $load_html);

    // Carrega os dados dinâmicos 2
    $file_html = '{{'.implode('}}&{{', array_keys($content)).'}}';
    $file_html = str_replace(explode('&', $file_html), array_values($content), $load_html);

    // Após ter carregado a página HTML e o conteúdo, renderiza em linha e com um único espaço
    $file_html = str_replace("\n", "", $file_html);
    $file_html = preg_replace('/\s+/', ' ', trim($file_html));

    return $file_html;
  }

  /**
   * Método responsável por carregar todo o template
   *
   * @param string|null $content Recebe o conteúdo da página
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

    self::minify_add(['main', self::$page], 'js');
    self::minify_add(['main', self::$page], 'css');

    $title = self::$title;
    $main_css = self::minify_file('css');
    $main_js = self::minify_file('js');

    ob_start();
    require_once __DIR__ . '/../../public/views/theme/main.php';
    $body = ob_get_contents();
    ob_clean();

    echo $body;die;
  }
}