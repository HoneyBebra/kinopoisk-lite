<?php
    use App\Router\Route;

    return [
        Route::get(uri:"/home", action:function() {
            include("views/pages/home.php");
        }),
        Route::get(uri:"/movies", action:function() {
            include("views/pages/movies.php");
        })
    ]
?>