<?php
    namespace App\Kernel\Router;

    class Route {
         public function __construct(
            private string $uri,  // declaring a property inside a constructor
            private string $method,  // http-method
            private $action
         )
         {}

         public static function get(string $uri, $action): static {
            return new static($uri, "GET", $action);  // return instance of this class
         }

         public static function post(string $uri, $action): static {
            return new static($uri, "POST", $action);  // return instance of this class
         }

         public function getUri(): string {
            return $this->uri;
         }

         public function getMethod(): string {
            return $this->method;
         }

         public function getAction() {
            return $this->action;
         }
    }
?>