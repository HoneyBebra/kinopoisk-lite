<?php
    namespace App\Kernel\View;

    class View {
        public function page(string $name): void {
            $viewPath = APP_PATH."/views/pages/{$name}.php";
            
            if (!file_exists($viewPath)) {
                throw new \App\Kernel\Exceptions\ViewNotFoundException("View {$name} not found");
            }

            extract([
                "view" => $this  // passing the var view in component 
            ]);
            
            include($viewPath);
        }

        public function component(string $name): void {
            $componentPath = APP_PATH."/views/components/{$name}.php";

            if (!file_exists($componentPath)) {
                throw new \App\Kernel\Exceptions\ComponentNotFoundException("Component {$name} not found");
            }

            include(APP_PATH."/views/components/{$name}.php");
        }
    }
?>