<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

use Alura\Mvc\Repository\RepositorioVideos;
use Alura\Mvc\Controller\VideoListController;

$videoRepository = new RepositorioVideos($pdo);

if(!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    $controller = new VideoListController($videoRepository);
    $controller->processaRequisicao();

} elseif($_SERVER['PATH_INFO'] === '/inserir-videos') {
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../formulario.php';
    } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../inserir-videos.php';
    }
} elseif($_SERVER['PATH_INFO'] === '/editar-videos') {
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../formulario.php';
    } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../editar-videos.php';
    }
} elseif($_SERVER['PATH_INFO'] === '/excluir-videos') {
    require_once __DIR__ . '/../excluir-videos.php';
} else {
    http_response_code(404);
}