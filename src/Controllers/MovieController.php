<?php
    namespace App\Controllers;

    use App\Kernel\Controller\Controller;

    class MovieController extends Controller {
        public function index(): void {
            $this->getView(name:"movies");
        }

        public function add(): void {
            $this->getView(name:"admin/movies/add");
        }

        public function store(): void {
            $validation = $this->getRequest()->validate([
                "name" => ['required', "min:3", "max:50"] 
            ]);

            if(! $validation) {
                dd("Validation failed", $this->getRequest()->errors());
            }

            dd("Validation passed"); 
        }
    }
?>