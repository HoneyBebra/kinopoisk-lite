<?php
    namespace App\Controllers;

    class HomeController {
        public function index(): void {
            include("views/pages/home.php");
        }
    }
?>