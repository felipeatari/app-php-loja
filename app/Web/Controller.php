<?php

namespace App\Web;

use App\Web\Controllers\Error;
use Closure;

class Controller
{
  private array $controllers = [];
  private array $params = [];
  private array $routes = [];
  private bool $callback = false;
  private int $http_status_code = 200;
  private string $http_method;
  private mixed $controller;
  private mixed $method;
  private string $uri;

  public function __construct(array $routes = [])
  {
    $this->uri = $_GET['url'] ?? '/';
    $this->http_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
  }

  private function addRoute(string $http_method, string $route, mixed $action)
  {
    $this->routes[] = [
      'http_method' => $http_method,
      'route' => $route,
      'action' => $action
    ];
  }

  public function routes(array $routes = []): ?Controller
  {
    if (empty($routes) or ! is_array($routes)) {
      return null;
    }

    foreach ($routes as $linha):
      if (empty($linha)) continue;

      $this->addRoute($linha[0], $linha[1], $linha[2]);
    endforeach;

    return $this;
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
    header('Location: ' . URL . $route);die;
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

    if (! $url) $url[] = '/';

    return $url;
  }

  /**
   * Verifica se é ou existe controller, closure, método ou parâmetros
   *
   * @param mixed $action Recebe o Controller@método
   * @param array $params Recebe um array de parâmetros
   *
   * @return void
   */
  private function checkout(mixed $action, array $params = []): void
  {
    // Verifica se é uma closure/callable ou um(a) classe/controller
    if (is_callable($action)) {
      $this->callback = true;
      $this->controllers[] = $action;
      $this->method = $action;
    }
    else {
      $action = explode('->', $action);

      $controller = ucfirst($action[0]);

      $namespace = 'App\\Web\\Controllers\\' . $controller;

      $this->controllers[] = $namespace;
      $this->method = $action[1];
    }

    // Verifica se há parâmetro(s)
    if (! empty($params)) $this->params = $params;
  }

  public function router(): ?Controller
  {
    $uri = $this->convertURLStrToURLArr($this->uri);
    $http_method = strtolower($this->http_method);
    $error_405 = false;

    foreach ($this->routes as $route):
      $get_route = $this->convertURLStrToURLArr($route['route']);

      // Verifica se a rota é dinâmica
      if (preg_match('/(\{[\w]+\})|(\:[\w]+)/', $route['route'])) {
        // Recupera os campos estáticos da rota
        $route_static_fields = array_map(function($item) {
          if (! preg_match('/(\{[\w]+\})|(\:[\w]+)/', $item)) return $item;
        }, $get_route);
        // Elimina os campos vazios da rota e ordena de forma numerada
        $route_static_fields = array_values(array_filter($route_static_fields));

        // Recupera os campos estáticos da URI
        $uri_static_fields = array_intersect($route_static_fields, $uri);

        // Verifica se a rota e a URI tem a mesma extensão e se os campos estáticos de ambas são iguais
        if ((count($get_route) === count($uri)) and ($uri_static_fields === $route_static_fields)) {
          // Verifica se método HTTP requisitado é o mesmo que foi definido para a rota
          if ($route['http_method'] !== $http_method) $error_405 = true;

          $this->checkout($route['action'], array_diff($uri, $get_route));
        }
      }

      // Verifica se a rota é estática
      if (($get_route === $uri)) {
        // Verifica se método HTTP requisitado é o mesmo que foi definido para a rota
        if ($route['http_method'] !== $http_method) {
          $error_405 = true;
        }

        $this->checkout($route['action']);
      }
    endforeach;

    if ($error_405) {
      $this->http_status_code = 405;

      return $this;
    }

    if (empty($this->controllers)) {
      $this->http_status_code = 404;

      return $this;
    }

    $error_404 = [];

    foreach ($this->controllers as $controller):
      if (is_callable($controller) or class_exists($controller)) {
        $this->controller = $controller;

        continue;
      }

      $error_404[] = 1;
    endforeach;

    if (count($error_404) === count($this->controllers)) {
      $this->http_status_code = 404;

      return $this;
    }

    if (! is_callable($this->controller)) {
      if (! method_exists($this->controller, $this->method)) $this->http_status_code = 405;
    }

    return $this;
  }

  /**
   * Carrega o conteúdo do controller
   */
  public function dispatcher()
  {
    http_response_code($this->http_status_code);

    if ($this->http_status_code !== 200) {
      if ($this->http_status_code === 405) $message_error = 'Método não implementado';
      if ($this->http_status_code === 404) $message_error = 'Pagina não encontrada';

      if ($this->callback) {
        return 'Error callback ' . $this->http_status_code;
      }

      return Error::error($this->http_status_code, $message_error);
    }

    if ($this->callback) {
      return call_user_func_array($this->method, $this->params) ?? '';
    }

    return call_user_func_array([new $this->controller, $this->method], $this->params) ?? '';
  }
}