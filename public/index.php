<?php
require __DIR__ . "/../vendor/autoload.php";
session_start();

use App\Controllers\AppController;

if(!isset($_SESSION["appController"])){
    $appController = new AppController();
    $_SESSION["appController"] = $appController;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/output.css">
    <title>Document</title>
</head>
<body>
    <h1 class="text-8xl">Prueba estilos</h1>
    <?= $_SERVER["REQUEST_URI"]?>
</body>
</html>