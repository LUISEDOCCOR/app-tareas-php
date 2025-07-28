<?php
namespace App\Core;

class View
{
    public static function render($view, $layout = "main_layout.php")
    {
        unset($_SESSION["content"]);
        $_SESSION["content"] = require_once VIEWS_DIRECTORY . "/$view";
        require_once VIEWS_DIRECTORY . "/layouts/$layout";
    }
}
