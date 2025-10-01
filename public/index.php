<?php
require_once(__DIR__ . '/../vendor/autoload.php');
session_start();
use Config\Router;

$router = new Router;

$router->addRoute('/', 'HomeController', 'index');
$router->addRoute('/inscription', 'RegisterController', 'index');
$router->addRoute('/connexion', 'SessionController', 'login');
$router->addRoute('/deconnexion', 'SessionController', 'logout');

$router->handleRequest();