<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\{DeleteVideoController,
        Error404Controller,
        ViewFormController,
        VideoListController,
        AddVideoController,
        UpdateVideoController,
        Controller
};

$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$requestMethod = $_SERVER['REQUEST_METHOD'];

session_start();
session_regenerate_id();
$loginPath = $pathInfo === '/login';
if(!array_key_exists('logado', $_SESSION) && !$loginPath){
    header('Location: /login');
    return;
}

$key = "$requestMethod|$pathInfo";
if(array_key_exists($key, $routes)){
    $controllerClass = $routes["$requestMethod|$pathInfo"];

    $controller = new $controllerClass($videoRepository);
} else {
    $controller = new Error404Controller();
}

/**
 * @var Controller $controller
 */

$controller->processaRequisicao();