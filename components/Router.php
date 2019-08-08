<?php

class Router
{

  private $routes;

  public function __construct()
  {
    $routesPath = ROOT . '/config/routes.php';
    $this->routes = include($routesPath);
  }

  private function getURI(): string
  {
    if (!empty($_SERVER['REQUEST_URI'])) {
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }

  public function run(): void
  {
    $uri = $this->getURI();
    $find = false;

    foreach ($this->routes as $uriPattern => $path) {

      if (preg_match("~$uriPattern~", $uri)) {

        if (strlen($uriPattern) == 0 && strlen($uri) != 0) {
          continue;
        }

        $find = true;

        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
        $segments = explode('/', $internalRoute);

        $controllerName = array_shift($segments) . 'Controller';
        $controllerName = ucfirst($controllerName);
        $actionName = 'action' . ucfirst(array_shift($segments));
        $parameters = $segments;


        $controllerObject = new $controllerName;
        $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

      }
    }

    if (!$find) {
      header('Location: /error');
    }

  }

}
