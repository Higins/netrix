<?php
require '../vendor/autoload.php';
include '../src//router/route.php';
error_reporting(E_ALL);
$router = new Router();
$router->addRoute("/task","ActiveCollab@index");
$router->run();

