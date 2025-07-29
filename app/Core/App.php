<?php
namespace App\Core;

use App\Controllers\HomeController;
use App\Controllers\AuthController;

class App
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();

        //Home
        $this->router->get("/", HomeController::class, "index", "home.index");
        //Auth
        $this->router->get(
            "/auth",
            AuthController::class,
            "auth",
            "auth.index",
        );
    }

    public function run()
    {
        $this->router->dispatch(
            $_SERVER["REQUEST_METHOD"],
            $_SERVER["REQUEST_URI"],
        );
    }
}
