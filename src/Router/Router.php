<?php
    namespace App\Router;

    class Router {
        public array $routes = [
            "GET" => [],
            "POST" => []
        ];

        public function __construct() {
            $this->initRoutes();
        }

        private function initRoutes() {
            $routes = $this->getRoutes();

            foreach ($routes as $route) {
                $this->routes[$route->getMethod()][$route->getUri()] = $route;
            }
        }

        public function dispatch(string $uri, string $method): void {
            $route = $this->findRoute(uri:$uri, method:$method);
            if (!$route) {
                $this->pathNotFound();
            }
            if (is_array($route->getAction())) {
                [$controller, $action] = $route->getAction();

                $controller = new $controller();  // create class instance by path
                $controller->$action();
            }
            else {
                $route->getAction()();  // for anonymous function
            }
        }

        public function pathNotFound() {
            echo "<h1>Error 404, wrong path<h1>";
            exit;
        }

        public function findRoute(string $uri, string $method): Route|false {
            if(!isset($this->routes[$method][$uri])) {
                return false;
            }
            return $this->routes[$method][$uri];
        }

        private function getRoutes(): array {
            return require_once "config/routes.php";
        }
    }
?>
