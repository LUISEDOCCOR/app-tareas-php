<?php
namespace App\Controllers;
use App\Core\View;

class AuthController
{
    public function auth()
    {
        View::render("/auth/index.php", "main_layout.php", [
            "action" => "signup",
        ]);
    }
}
