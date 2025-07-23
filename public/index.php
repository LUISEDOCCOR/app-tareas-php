<?php
require __DIR__ . "/../vendor/autoload.php";
session_start();

use App\Controllers\AppController;

if(!isset($_SESSION["appController"])){
    $appController = new AppController();
    $_SESSION["appController"] = $appController;
}
?>