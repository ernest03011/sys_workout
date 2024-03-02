<?php

const BASE_PATH = __DIR__ ."/../";

session_start();

require BASE_PATH . "vendor/autoload.php";
require BASE_PATH . "Core/functions.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$router =  new \Core\Router();
require BASE_PATH . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


