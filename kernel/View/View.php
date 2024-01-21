<?php
    namespace App\Kernel\View;

    class View {
        public function page(string $name): void {
            extract([
                "view" => $this  // passing the var view in component 
            ]);
            
            include(APP_PATH."/views/pages/{$name}.php");
        }

        public function component(string $name): void {
            include(APP_PATH."/views/components/{$name}.php");
        }
    }
?>