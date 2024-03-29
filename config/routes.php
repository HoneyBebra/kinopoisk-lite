<?php
    use App\Kernel\Router\Route;
    use App\Controllers\HomeController;
    use App\Controllers\MovieController;

    return [
        Route::get(uri:"/home", action:[
            HomeController::class,  // path to class
            "index"  // action
        ]),
        Route::get(uri:"/movies", action:[
            MovieController::class, 
            "index"
        ]),
        Route::get(uri:"/admin/movies/add", action:[
            MovieController::class, 
            "add"
        ]),
        Route::post(uri:"/admin/movies/add", action:[
            MovieController::class, 
            "store"
        ])
    ]
?>