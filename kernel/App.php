<?php
    namespace App\Kernel;  // autoload (check composer.json)

use App\Kernel\Container\Container;

    class App { 
        private Container $container;

        public function __construct() {
            $this->container = new Container();
        }

        public function run(): void {
            $this->container->router->dispatch(
                uri:$this->container->request->uri(), 
                method:$this->container->request->method()
            );
        }
    }
?>