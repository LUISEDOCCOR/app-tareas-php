<?php
namespace App\Core;

use App\Controllers\HomeController;

class App
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();

        //Home
        $this->router->get("/", HomeController::class, "index", "home.index");
    }

    public function run()
    {
        $this->router->dispatch(
            $_SERVER["REQUEST_METHOD"],
            $_SERVER["REQUEST_URI"],
        );
    }
}
