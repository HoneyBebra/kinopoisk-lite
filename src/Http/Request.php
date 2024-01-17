<?php
    namespace App\Http;

    class Request {  // class for safe use of global vars
            public function __construct(
                public readonly array $get,  // readonly - can't change
                public readonly array $post,
                public readonly array $server,
                public readonly array $files,
                public readonly array $cookies,
            )
            {}

            public static function createFromGlobals(): static {  // create new instance this class
                return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE );
            }

            public function uri(): string {
                return strtok($this->server["REQUEST_URI"], token:"?");  // cut of the string after "?" (delete get parameters)
            }

            public function method(): string {
                return $this->server["REQUEST_METHOD"];
            }
    }
?>