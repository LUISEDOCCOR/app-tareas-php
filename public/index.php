<?php
require __DIR__ . "/../vendor/autoload.php";
session_start();

use App\Core\App;

$app = new App();
$app->run();
