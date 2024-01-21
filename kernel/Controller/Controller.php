<?php
    namespace App\Kernel\Controller;

    use App\Kernel\View\View;

    abstract class Controller {  // init services
        private View $view;

        public function getView(string $name): void {
            $this->view->page($name);
        }

        public function setView(View $view): void {
            $this->view = $view;
        }
    }
?>