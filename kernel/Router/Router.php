<?php
    namespace App\Kernel\Router;

    use App\Kernel\Http\Request;
    use App\Kernel\View\View;

    class Router {
        public array $routes = [
            "GET" => [],
            "POST" => []
        ];

        public function __construct(
            private View $view,
            private Request $request
        ) {
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

                call_user_func([$controller, "setView"], $this->view);
                call_user_func([$controller, "setRequest"], $this->request);
                call_user_func([$controller, $action]);
            }
            else {
                call_user_func($route->getAction());  // for anonymous function
            }
        }

        public function pathNotFound() {
            echo "<h1>Error 404, wrong path<h1>";
            // echo dd($this->routes); // for check routes
            exit;
        }

        public function findRoute(string $uri, string $method): Route|false {
            if(!isset($this->routes[$method][$uri])) {
                return false;
            }
            return $this->routes[$method][$uri];
        }

        private function getRoutes(): array {
            return require_once APP_PATH."/config/routes.php";
        }
    }
?>
