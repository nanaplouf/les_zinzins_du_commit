<?php
require_once(__DIR__ . '/../vendor/autoload.php');
use Config\Router;

$router = new Router;

$router->addRoute('/', 'HomeController', 'index');
$router->addRoute('/inscription', 'RegisterController', 'index');

$router->handleRequest();