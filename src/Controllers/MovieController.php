<?php
    namespace App\Controllers;

    class MovieController {
        public function index(): void {
            include("views/pages/movies.php");
        }
    }
?>