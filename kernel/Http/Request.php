<?php
    namespace App\Kernel\Http;

use App\Kernel\Validator\Validator;

    class Request {  // class for safe use of global vars
            private Validator $validator; 

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

            public function input(string $key, $degault = null): mixed {
                return $this->post[$key] ?? $this->get[$key] ?? $degault;
            }

            public function setValidator(Validator $validator): void {
                $this->validator = $validator; 
            }

            public function validate(array $rules): bool {
                $data = [];

                foreach ($rules as $field => $rule) {
                    $data[$field] = $this->input($field);
                }

                return $this->validator->validate($data, $rules); 
            }

            public function errors(): array {
                return $this->validator->errors(); 
            }
    }
?>