<?php

namespace App\Http;

use App\Controllers\ErrorController as Error;
use Closure;

class Router
{
  private array $controllers = [];
  private array $params = [];
  private array $routes = [];
  private bool $callback = false;
  private bool $api = false;
  private int $httpStatusCode = 200;
  private string $httpMethod;
  private string|Closure $controller;
  private string|Closure $method;
  private string $uri;

  public function __construct()
  {
    $this->uri = $_GET['url'] ?? '/';
    $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
  }

  public static function redirect(string $route): void
  {
    header('Location: ' . URL . $route);die;
  }

  private function convertUrlStrToUrlArr(string $url = null): array
  {
    $url = explode('/', $url);
    $url = array_values(array_filter($url));

    if (! $url) $url[] = '/';

    return $url;
  }

  private function addRoute(string $httpMethod, string $route, string|Closure $action)
  {
    $this->routes[] = [
      'http_method' => $httpMethod,
      'route' => $route,
      'action' => $action
    ];
  }

  public function get(string $route, string|Closure $action)
  {
    $this->addRoute('get', $route, $action);
  }

  public function post(string $route, string|Closure $action)
  {
    $this->addRoute('post', $route, $action);
  }

  public function put(string $route, string|Closure $action)
  {
    $this->addRoute('put', $route, $action);
  }

  public function patch(string $route, string|Closure $action)
  {
    $this->addRoute('patch', $route, $action);
  }

  public function delete(string $route, string|Closure $action)
  {
    $this->addRoute('delete', $route, $action);
  }

  public function head(string $route, string|Closure $action)
  {
    $this->addRoute('head', $route, $action);
  }

  public function options(string $route, string|Closure $action)
  {
    $this->addRoute('options', $route, $action);
  }

  private function makeRouter(string|Closure $action, array $params = []): void
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

      $namespace = 'App\\Controllers\\' . $controller . 'Controller';

      $this->controllers[] = $namespace;
      $this->method = $action[1];
    }

    // Verifica se há parâmetro(s)
    if (! empty($params)) $this->params = $params;
  }

  public function on(): Router
  {
    $uri = $this->convertUrlStrToUrlArr($this->uri);
    $httpMethod = strtolower($this->httpMethod);
    $error404 = true;
    $error405 = true;

    if ($uri[0] === 'api') {
      $this->api = true;
    }

    foreach ($this->routes as $route):
      $uriRoute = $this->convertUrlStrToUrlArr($route['route']);

      // Verifica se a rota é dinâmica
      if (preg_match('/(\{[\w]+\})|(\:[\w]+)/', $route['route'])) {

        // Recupera os campos estáticos da rota
        $routeStaticFields = array_map(function($item) {
          if (! preg_match('/(\{[\w]+\})|(\:[\w]+)/', $item)) return $item;
        }, $uriRoute);
        // Elimina os campos vazios da rota e ordena de forma numerada
        $routeStaticFields = array_values(array_filter($routeStaticFields));

        // Recupera os campos estáticos da URI
        $uriStaticFields = array_intersect($routeStaticFields, $uri);

        // Verifica se a rota e a URI tem a mesma extensão e se os campos estáticos de ambas são iguais
        if ((count($uriRoute) === count($uri)) and ($uriStaticFields === $routeStaticFields)) {
          // Verifica se método HTTP requisitado é o mesmo que foi definido para a rota

          $error404 = false;

          if ($route['http_method'] !== $httpMethod) {

            continue;
          }

          $error405 = false;

          $this->makeRouter($route['action'], array_diff($uri, $uriRoute));
        }
      }

      // Verifica se a rota é estática
      if (($uriRoute === $uri)) {
        $error404 = false;

        // Verifica se método HTTP requisitado é o mesmo que foi definido para a rota
        if ($route['http_method'] !== $httpMethod) {

          continue;
        }

        $error405 = false;

        $this->makeRouter($route['action']);
      }
    endforeach;

    if (!$error404 and $error405) {
      $this->httpStatusCode = 405;

      return $this;
    }

    if (empty($this->controllers)) {
      $this->httpStatusCode = 404;

      return $this;
    }

    $error404 = [];

    foreach ($this->controllers as $controller):
      if (is_callable($controller) or class_exists($controller)) {

        $this->controller = $controller;

        continue;
      }

      $error404[] = 1;
    endforeach;

    if (count($error404) === count($this->controllers)) {
      $this->httpStatusCode = 404;

      return $this;
    }

    if (! is_callable($this->controller)) {
      if (! method_exists($this->controller, $this->method)) $this->httpStatusCode = 405;
    }

    return $this;
  }

  public function dispatcher()
  {
    http_response_code($this->httpStatusCode);

    if ($this->httpStatusCode !== 200) {
      if ($this->httpStatusCode === 405) $messageError = 'Método não implementado';
      if ($this->httpStatusCode === 404) $messageError = 'Pagina não encontrada';

      if ($this->callback or $this->api) {

        die(Error::error_api($this->httpStatusCode, $messageError));
      }

      die(Error::error($this->httpStatusCode, $messageError));
    }

    if ($this->callback or $this->api) {

      return call_user_func_array($this->method, $this->params) ?? '';
    }

    return call_user_func_array([new $this->controller, $this->method], $this->params) ?? '';
  }
}