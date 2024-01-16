<?php
    namespace App;  // autoload (check composer.json)

    class App {
        public function run(): void {
            $router = new Router\Router();
            $uri = $_SERVER["REQUEST_URI"];
            $method = $_SERVER["REQUEST_METHOD"];
            $router->dispatch(uri:$uri, method:$method);
        }
    }
?>