<?php
require __DIR__ . "/vendor/autoload.php";

use App\Controllers\AppController;

if($_SESSION["appController"] == null){
    $appController = new AppController();
    $_SESSION["appController"] = $appController;
}