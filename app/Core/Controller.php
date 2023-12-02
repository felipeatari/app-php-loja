<?php

namespace App\Core;

use App\Controllers\PageErrorController;
use Closure;

class Controller
{
  private array $controllers = [];
  private array $params = [];
  private array $routes = [];
  private bool $callback = false;
  private int $http_status_code = 200;
  private string $http_method;
  private string $controller;
  private string $method;
  private string $uri;

  public function __construct()
  {
    $this->uri = $_GET['url'] ?? '/';
    $this->http_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
  }

  /**
   * Gurda todas as rotas
   *
   * @param string $http_method Recebe o endpoint
   * @param string $route Recebe o endpoint
   * @param string|closure $action Recebe o Controller@método ou um callback
   *
   * @return array Atributo $routes
   */
  private function addRoute(string $http_method, string $route, string|closure $action): array
  {
    return $this->routes[] = [
      'http_method' => $http_method,
      'route' => $route,
      'action' => $action
    ];
  }

  /**
   * Guarda a(s) rota(s) GET
   *
   * @param string $route Recebe o endpoint
   * @param string|closure $action Recebe o Controller@método
   *
   * @return array Método addRoute()
   */
  public function get(string $route, string|closure $action): array
  {
    return $this->addRoute('get', $route, $action);
  }

  /**
   * Guarda a(s) rota(s) POST
   *
   * @param string $route Recebe o endpoint
   * @param string|closure $action Recebe o Controller@método
   *
   * @return array Método addRoute()
   */
  public function post(string $route, string|closure $action): array
  {
    return $this->addRoute('post', $route, $action);
  }

  /**
   * Guarda a(s) rota(s) PUT
   *
   * @param string $route Recebe o endpoint
   * @param string|closure $action Recebe o Controller@método
   *
   * @return array Método addRoute()
   */
  public function put(string $route, string|closure $action): array
  {
    return $this->addRoute('put', $route, $action);
  }

  /**
   * Guarda a(s) rota(s) DELETE
   *
   * @param string $route Recebe o endpoint
   * @param string|closure $action Recebe o Controller@método
   *
   * @return array Método addRoute()
   */
  public function delete(string $route, string|closure $action): array
  {
    return $this->addRoute('delete', $route, $action);
  }

  /**
   * Direciona para alguma rota especifica
   *
   * @param string $route Recebe o endpoint
   *
   * @return void
   */
  public static function redirect(string $route): void
  {
    header('Location: ' . URL . $route);
    die;
  }

  /**
   * Converte a URL de string para array
   *
   * @param string $url recebe a URL
   *
   * @return array
   */
  private function convertURLStrToURLArr(string $url = null): array
  {
    $url = explode('/', $url);
    $url = array_values(array_filter($url));

    if (! $url) {
      $url[] = '/';
    }

    return $url;
  }

  /**
   * Verifica se é ou existe controller, closure, método ou parâmetros
   *
   * @param string|closure $action Recebe o Controller@método
   * @param array $params Recebe um array de parâmetros
   *
   * @return void
   */
  private function checkout(string|closure $action, array $params = []): void
  {
    // Verifica se é uma closure/callable ou um(a) classe/controller
    if (is_callable($action)) {
      $this->callback = true;
      $this->controllers[] = $action;
      $this->method = $action;
    }
    else {
      $action = explode('@', $action);
      $this->controllers[] = 'App\\Controllers\\' . ucfirst($action[0] . 'Controller');
      $this->method = $action[1];
    }

    // Verifica se há parâmetro(s)
    if (! empty($params)) {
      $this->params = $params;
    }
  }

  /**
   * Valida as rotas do projeto
   *
   * @return void
   */
  public function router(): void
  {
    $uri = $this->convertURLStrToURLArr($this->uri);
    $http_method = strtolower($this->http_method);
    $error_405 = false;

    // Verifica às informações contidas no motor da rota
    foreach ($this->routes as $route):

      // Converte à URL de string para array
      $get_route = $this->convertURLStrToURLArr($route['route']);

      // Verifica se a rota é dinâmica
      if (preg_match('/(\{[\w]+\})|(\:[\w]+)/', $route['route'])) {

        // Recupera os campos estáticos da rota
        $route_static_fields = array_map(function($item) {
          if (! preg_match('/(\{[\w]+\})|(\:[\w]+)/', $item)) {
            return $item;
          }
        }, $get_route);

        // Elimina os campos vazios da rota e ordena de forma numerada
        $route_static_fields = array_values(array_filter($route_static_fields));

        // Recupera os campos estáticos da URI
        $uri_static_fields = array_intersect($route_static_fields, $uri);

        // Verifica se a rota e a URI tem a mesma extensão e se os campos estáticos de ambas são iguais
        if ((count($get_route) == count($uri)) and ($uri_static_fields == $route_static_fields)) {
          // Verifica se método HTTP requisitado é o mesmo que foi definido para a rota
          if ($route['http_method'] != $http_method) {
            $error_405 = true;
          }

          $this->checkout($route['action'], array_diff($uri, $get_route));
        }
      }

      // Verifica se a rota é estática
      if (($get_route == $uri)) {
        // Verifica se método HTTP requisitado é o mesmo que foi definido para a rota
        if ($route['http_method'] != $http_method) {
          $error_405 = true;
        }

        $this->checkout($route['action']);
      }

    endforeach;

    if ($error_405) {
      $this->http_status_code = 405;

      return;
    }

    if (empty($this->controllers)) {
      $this->http_status_code = 404;

      return;
    }

    $error_404 = [];

    foreach ($this->controllers as $controller):
      if (is_callable($controller) or class_exists($controller)) {
        $this->controller = $controller;

        continue;
      }

      $error_404[] = 1;
    endforeach;

    if (count($error_404) == count($this->controllers)) {
      $this->http_status_code = 404;

      return;
    }

    if (! is_callable($this->controller)) {
      if (! method_exists($this->controller, $this->method)) {
        $this->http_status_code = 405;
      }
    }
  }

  /**
   * Carrega o conteúdo do controller
   *
   * @return string|null
   */
  public function dispatcher(): ?string
  {
    http_response_code($this->http_status_code);

    if ($this->http_status_code != 200) {
      if ($this->http_status_code == 405) {
        $message_error = 'Método não implementado';
      }

      if ($this->http_status_code == 404) {
        $message_error = 'Pagina não encontrada';
      }

      return PageErrorController::error($this->http_status_code, $message_error);
    }

    if ($this->callback) {
      return call_user_func_array($this->method, $this->params);
    }

    return call_user_func_array([new $this->controller, $this->method], $this->params);
  }
}