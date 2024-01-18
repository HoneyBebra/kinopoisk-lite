<?php
    namespace App\Kernel;  // autoload (check composer.json)

    class App {
        public function run(): void {
            $router = new Router\Router();
            $request = Http\Request::createFromGlobals();
            $router->dispatch(uri:$request->uri(), method:$request->method());
        }
    }
?>